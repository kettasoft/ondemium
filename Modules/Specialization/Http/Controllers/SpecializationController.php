<?php

namespace Modules\Specialization\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Modules\Specialization\Models\Specialization;
use Modules\Specialization\Http\Requests\AddSpecializationToWebsiteRequest;
use Modules\Specialization\Http\Requests\UpdateSpecialization;
use Modules\Specialization\Http\Requests\AttachSpecializationsToDoctorRequest;
use Modules\User\Models\User;

class SpecializationController extends Controller
{

    /**
     * Assistant method to vefiry the presence of Specialization on the website
     * @param string $slug
     * @return bool
     */
    private function checkIfSpecializationExists(string $slug): bool
    {
        return Specialization::whereSlug($slug)->exists();
    }

    /**
     * The method of assistant to explode the string and dorect the specializations slug in colection
     *  @param string specializations
     *  @return Collection
     */
    private function explode(string $specializations): Collection
    {
        $exploded = str_contains($specializations, ',') ? explode(',', trim($specializations)) : [$specializations];

        return collect($exploded)->map(function (string $specialization) {
            return trim($specialization);
        });
    }

    /**
     * Add a new specialty to the website
     * @param AddSpecializationToWebsiteRequest $request
     * @return ResponseJson
     */
    public function addSpecializationToWebsite(AddSpecializationToWebsiteRequest $request): JsonResponse
    {
        $data = $request->all();
        if (is_null($request->slug) || empty($request->slug)) {
            $data['slug'] = \Str::slug($data['name']);
        }

        if ($this->checkIfSpecializationExists($data['slug'])) {
            return alert('This specialty is already on the website.!', false, 400);
        }

        $create = Specialization::create($data);

        if ($create) {
            return alert('A new specialty has been added to the website', status:201);
        }
    }

    /**
     * General specialization remove on the website
     * @param Specialization $slug
     * @return ResponseJson
     */
    public function removeSpecializationFromWebsite(Specialization $slug)
    {
        if ($slug->delete()) {
            return alert('A specialty has been removed from the website');
        }
    }

    /**
     * General specialization update on the website
     * @param Specialization $specialization
     * @param UpdateSpecialization $request
     */
    public function updateSpecialization(Specialization $specialization, UpdateSpecialization $request)
    {
        if ($specialization->update($request->all())) {
            return alert("A specialty {$request->slug} has been updated on the website");
        }
    }

    /**
     * Attach a specialization or a group of specializations to the doctor
     * @param AttachSpecializationsToDoctorRequest $request
     * @return JsonResponse
     */
    public function attachSpecializationsToDoctor(AttachSpecializationsToDoctorRequest $request): JsonResponse
    {
        $specializations = $this->explode($request->get('specializations'));

        $specializations->map(function (string $specialization) {
            $specializationsWhereSlug = Specialization::whereSlug($specialization)->get('id');

            $specializationsWhereSlug->map(function (Specialization $model) {
                auth()->user()->specializations()->attach($model);
            });
        });

        return alert('Your specializations have been successfully attached.', status:201);
    }

    /**
     * Detach the specialty from the doctor
     * @param User $doctor
     * @param Specialization $specialization
     * @return 
     */
    public function detachSpecializationFromDoctor(User $doctor, Specialization $specialization): JsonResponse
    {
        $doctor->specializations()->detach($specialization);

        return alert('successfully');
    }

    /**
     * Obtaining all the specialties attached to the doctor
     * @param User $doctor
     * @return JsonResponse
     */
    public function allSpecialtiesAttachedToDoctor(User $doctor): JsonResponse
    {
        return response()->json($doctor->specializations);
    }

    public function getDoctorsAttachedToSpecialization(Specialization $specialization)
    {
        return $specialization->doctors()->simplePaginate(100);
    }

    public function allSpecializations()
    {
        $specializations = Specialization::get();

        return response()->json($specializations);
    }
}
