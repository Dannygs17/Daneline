<?php

namespace App\Enums;

use function array_column;

enum DishCategory: string {
	case APPETIZER = 'appetizer';
	case MAIN_COURSE = 'main_course';
	case SOUP = 'soup';
	case GARNISH = 'garnish';
	case DRINK = 'drink';
	case DESSERT = 'dessert';
	
	public static function values(): array {
		return array_column(self::cases(), 'value');
	}
}
