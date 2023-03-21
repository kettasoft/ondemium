<?php

namespace App\Enums;

enum QuestionEnum: int
{
	private const FOR_ME = 1;
	private const ANOTHER_PERSON = 2;

	public static function whom(int $value): string
	{
		return match ($value) {
			self::FOR_ME => 'For me',
			self::ANOTHER_PERSON => 'Another person',
		};
	}
}