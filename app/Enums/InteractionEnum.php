<?php

namespace App\Enums;

enum InteractionEnum 
{
	private const LIKE = 1;
	private const LOVE = 2;
	private const WOW = 3;
	private const GLAD = 4;
	private const UGLY = 5;

	public static function getInteractionName($value): string
	{
		return match ($value) {
			self::LIKE => 'like',
			self::LOVE => 'love',
			self::WOW => 'wow',
			self::GLAD => 'glad',
			self::UGLY => 'ugly',
			default => 'like',
		};
	}
}