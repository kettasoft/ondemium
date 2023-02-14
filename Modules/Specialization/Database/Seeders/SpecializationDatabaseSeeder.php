<?php

namespace Modules\Specialization\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SpecializationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \DB::table('specializations')->insert([
            // ['name' => $name = 'Allergy and Immunology', 'slug' => \Str::slug(strtolower($name)), 'description' => 'Specialists in allergy and immunology work with both adult and pediatric patients suffering from allergies and diseases of the respiratory tract or immune system. They may help patients suffering from common diseases such as asthma, food and drug allergies, immune deficiencies, and diseases of the lung. Specialists in allergy and immunology can pursue opportunities in research, education, or clinical practice.'],

            // ['name' => $name = 'Dermatology', 'slug' => \Str::slug(strtolower($name)), 'description' => 'Anesthesiology is the branch of medicine dedicated to pain relief for patients before, during, and after surgery.'],

            // ['name' => $name = 'Anesthesiology', 'slug' => \Str::slug(strtolower($name)), 'description' => 'Dermatologists are physicians who treat adult and pediatric patients with disorders of the skin, hair, nails, and adjacent mucous membranes. They diagnose everything from skin cancer, tumors, inflammatory diseases of the skin, and infectious diseases. They also perform skin biopsies and dermatological surgical procedures.'],

            // ['name' => $name = 'Abdominal radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Breast imaging', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Cardiothoracic radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Cardiovascular radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Chest radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Emergency radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Endovascular surgical neuroradiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Gastrointestinal radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Genitourinary radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Head and neck radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Interventional radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Musculoskeletal radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Neuroradiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Nuclear radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Vascular and interventional radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Diagnostic radiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pain medicine', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Undersea and hyperbaric medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric emergency medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Medical toxicology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Internal medicine / Critical care medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Emergency medical services', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Anesthesiology critical care medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Adolescent medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Geriatric medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Sleep medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Hospice and palliative medicine', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Advanced heart failure and transplant cardiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Cardiovascular disease', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Clinical cardiac electrophysiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Critical care medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Endocrinology, diabetes, and metabolism', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Gastroenterology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Hematology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Hematology and oncology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Infectious disease', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Internal medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Interventional cardiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Nephrology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Oncology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric internal medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pulmonary disease', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pulmonary disease and critical care medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Rheumatology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Sports medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Transplant hepatology', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Biochemical genetics', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Clinical cytogenetics', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Clinical genetics', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Molecular genetic pathology', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Brain injury medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Child neurology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Clinical neurophysiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Neurodevelopmental disabilities', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Neuromuscular medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Vascular neurology', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Nuclear medicine', 'slug' => \Str::slug(strtolower($name)), 'description' => 'Physicians who practice nuclear medicine are called nuclear radiologists or nuclear medicine radiologists. They use radioactive materials to diagnose and treat diseases. Utilizing techniques such as scintigraphy, these physicians analyze images of the body’s organs to visualize certain diseases. They may also use radiopharmaceuticals to treat hyperthyroidism, thyroid cancer, tumors, and bone cancer.'],

            // ['name' => $name = 'Female pelvic medicine and reconstructive surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Gynecologic oncology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Maternal-fetal medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Reproductive endocrinologists and infertility', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Obstetrics and gynecology', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Ophthalmology', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Anterior segment/cornea ophthalmology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Glaucoma ophthalmology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Neuro-ophthalmology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Ocular oncology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Oculoplastics/orbit', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Ophthalmic Plastic & Reconstructive Surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Retina/uveitis', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Strabismus/pediatric ophthalmology', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Pathology', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Anatomical pathology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Blood banking and transfusion medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Chemical pathology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Clinical pathology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Cytopathology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Forensic pathology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Genetic pathology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Immunopathology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Medical microbiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Molecular pathology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Neuropathology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric pathology', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Pediatrics', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Child abuse pediatrics', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Developmental-behavioral pediatrics', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Neonatal-perinatal medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric cardiology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric critical care medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric endocrinology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric gastroenterology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric hematology-oncology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric infectious diseases', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric nephrology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric pulmonology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric rheumatology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric sports medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric transplant hepatology', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Physical medicine and Rehabilitation', 'slug' => \Str::slug(strtolower($name)), 'description' => 'Physicians specializing in physical medicine and rehabilitation work to help patients with disabilities of the brain, spinal cord, nerves, bones, joints, ligaments, muscles, and tendons. Physiatrists work with patients of all ages and design care plans for conditions, such as spinal cord or brain injury, stroke, multiple sclerosis, and musculoskeletal and pediatric rehabilitation. Unlike many other medical specialties, physiatrists work to improve patient quality of life, rather than seek medical cures.'],

            // ['name' => $name = 'Pain medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric rehabilitation medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Spinal cord injury medicine', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Preventive medicine', 'slug' => \Str::slug(strtolower($name)), 'description' => 'Physicians specializing in preventative medicine work to prevent disease by promoting patient health and well-being. Their expertise goes far beyond preventative practices in clinical medicine, covering elements of biostatistics, epidemiology, environmental and occupational medicine, and even the evaluation and management of health services and healthcare organizations. The field combines interdisciplinary elements of medical, social, economic, and behavioral sciences to understand the causes of disease and injury in population groups.'],

            // ['name' => $name = 'Aerospace medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Occupational medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Public health medicine', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Psychiatry', 'slug' => \Str::slug(strtolower($name)), 'description' => 'Physicians specializing in psychiatry devote their careers to mental health and its associated mental and physical ramifications. Understanding the connections between genetics, emotion, and mental illness, is important while psychiatrists also conduct medical laboratory and psychological tests to diagnose and treat patients.'],

            // ['name' => $name = 'Addiction psychiatry', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Administrative psychiatry', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Child and adolescent psychiatry', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Community psychiatry', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Consultation/liaison psychiatry', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Emergency psychiatry', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Forensic psychiatry', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Geriatric psychiatry', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Mental retardation psychiatry', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Military psychiatry', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Psychiatric research', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Psychosomatic medicine', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Radiation oncology', 'slug' => \Str::slug(strtolower($name)), 'description' => 'Physicians specializing in radiation oncology treat cancer with the use of high-energy radiation therapy. By targeting radiation doses in small areas of the body, radiation oncologists damage the DNA of cancer cells, preventing further growth. Radiation oncologists work with cancer patients, prescribing and implementing treatment plans while monitoring their progress throughout.'],

            // ['name' => $name = 'Surgery', 'slug' => \Str::slug(strtolower($name)), 'description' => 'Physicians specializing in surgery can choose to become general surgeons or pursue a subspecialty in a specific area of the body, type of patient, or type of surgery. General surgeons provide a wide variety of life-saving surgeries, such as appendectomies and splenectomies. They receive broad training on human anatomy, physiology, intensive care, and wound healing.'],

            // ['name' => $name = 'Colon and rectal surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'General surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Surgical critical care', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Plastic surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Craniofacial surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Hand surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Neurological surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Ophthalmic surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Oral and maxillofacial surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Adult reconstructive orthopaedics', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Foot and ankle orthopaedics', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Musculoskeletal oncology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Orthopaedic sports medicine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Orthopaedic surgery of the spine', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Orthopaedic trauma', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric orthopaedics', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Otolaryngology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric otolaryngology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Otology neurotology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Neonatal', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Prenatal', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Trauma', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Pediatric oncology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Surgical Intensivists, specializing in critical care patients', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Thoracic Surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Congenital cardiac surgery', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Thoracic surgery-integrated', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Vascular surgery', 'slug' => \Str::slug(strtolower($name))],

            // ['name' => $name = 'Urology', 'slug' => \Str::slug(strtolower($name)), 'description' => 'Urology is the health care segment that cares for the male and female urinary tract, including kidneys, ureters, bladder, and urethra. It also deals with the male sex organs. Urologists have knowledge of surgery, internal medicine, pediatrics, gynecology, and more.'],

            // ['name' => $name = 'Pediatric urology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Urologic oncology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Renal transplant', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Male infertility', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Calculi', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Female urology', 'slug' => \Str::slug(strtolower($name))],
            // ['name' => $name = 'Neurourology', 'slug' => \Str::slug(strtolower($name))],
        ]);

        // $this->call(SpecializationDatabaseSeeder::class);
    }
}
