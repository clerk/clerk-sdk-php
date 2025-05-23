<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


enum OTPVerificationStrategy: string
{
    case PhoneCode = 'phone_code';
    case EmailCode = 'email_code';
    case ResetPasswordEmailCode = 'reset_password_email_code';
}
