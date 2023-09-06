<?php
declare(strict_types=1);

/**
 * Laravel API Response Builder - configuration file
 *
 * See docs/config.md for detailed documentation
 *
 * @author    Marcin Orlowski <mail (#) marcinOrlowski (.) com>
 * @copyright 2016-2022 Marcin Orlowski
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/MarcinOrlowski/laravel-api-response-builder
 *
 * @noinspection PhpCSValidationInspection
 * phpcs:disable Squiz.PHP.CommentedOutCode.Found
 */

return [
	/*
	|-------------------------------------------------------------------------------------------------------------------
	| Code range settings
	|-------------------------------------------------------------------------------------------------------------------
	*/
	'min_code'          => 100,
	'max_code'          => 1024,

	/*
	|-------------------------------------------------------------------------------------------------------------------
	| Error code to message mapping
	|-------------------------------------------------------------------------------------------------------------------
	*/
	'map'               => [
//         YOUR_API_CODE => '<MESSAGE_LOCALISATION_KEY>',
        \App\ApiCode::SOMETHING_WENT_WRONG => 'api.something_went_wrong',
        \App\ApiCode::INVALID_CREDENTIALS => 'api.invalid_credentials',
        \App\ApiCode::VALIDATION_ERROR => 'api.validation_error',
        \App\ApiCode::INVALID_EMAIL_VERIFICATION_URL => 'api.invalid_email_verification_link',
        \App\ApiCode::EMAIL_ALREADY_VERIFIED => 'api.email_already_verified',
        \App\ApiCode::INVALID_RESET_PASSWORD_TOKEN => 'api.invalid_reset_password_token',
		\App\ApiCode::TAMU_NOT_FOUND => 'api.tamu_not_found',
		\App\ApiCode::EMAIL_NOT_VERIFIED => 'api.email_not_verified',
	],



];
