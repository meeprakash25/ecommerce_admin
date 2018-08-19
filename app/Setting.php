<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = ['tax', 'currency'];

    public function currency_info()
    {

       return $currency_info = [
            ['code' => 'AED', 'name' => 'United Arab Emirates Dirham'],
            ['code' => 'ANG', 'name' => 'NL Antillian Guilder'],
            ['code' => 'ARS', 'name' => 'Argentine Peso'],
            ['code' => 'AUD', 'name' => 'Australian Dollar'],
            ['code' => 'BRL', 'name' => 'Brazilian Real'],
            ['code' => 'BSD', 'name' => 'Bahamian Dollar'],
            ['code' => 'CAD', 'name' => 'Canadian Dollar'],
            ['code' => 'CHF', 'name' => 'Swiss Franc'],
            ['code' => 'CLP', 'name' => 'Chilean Peso'],
            ['code' => 'CNY', 'name' => 'Chinese Yuan Renminbi'],
            ['code' => 'COP', 'name' => 'Colombian Peso'],
            ['code' => 'CZK', 'name' => 'Czech Koruna'],
            ['code' => 'DKK', 'name' => 'Danish Krone'],
            ['code' => 'EUR', 'name' => 'Euro'],
            ['code' => 'FJD', 'name' => 'Fiji Dollar'],
            ['code' => 'GBP', 'name' => 'British Pound'],
            ['code' => 'GHS', 'name' => 'Ghanaian New Cedi'],
            ['code' => 'GTQ', 'name' => 'Guatemalan Quetzal'],
            ['code' => 'HKD', 'name' => 'Hong Kong Dollar'],
            ['code' => 'HNL', 'name' => 'Honduran Lempira'],
            ['code' => 'HRK', 'name' => 'Croatian Kuna'],
            ['code' => 'HUF', 'name' => 'Hungarian Forint'],
            ['code' => 'IDR', 'name' => 'Indonesian Rupiah'],
            ['code' => 'ILS', 'name' => 'Israeli New Shekel'],
            ['code' => 'INR', 'name' => 'Indian Rupee'],
            ['code' => 'ISK', 'name' => 'Iceland Krona'],
            ['code' => 'JMD', 'name' => 'Jamaican Dollar'],
            ['code' => 'JPY', 'name' => 'Japanese Yen'],
            ['code' => 'KRW', 'name' => 'South-Korean Won'],
            ['code' => 'LKR', 'name' => 'Sri Lanka Rupee'],
            ['code' => 'MAD', 'name' => 'Moroccan Dirham'],
            ['code' => 'MMK', 'name' => 'Myanmar Kyat'],
            ['code' => 'MXN', 'name' => 'Mexican Peso'],
            ['code' => 'MYR', 'name' => 'Malaysian Ringgit'],
            ['code' => 'NOK', 'name' => 'Norwegian Kroner'],
            ['code' => 'NZD', 'name' => 'New Zealand Dollar'],
            ['code' => 'NPR', 'name' => 'Nepali Rupee'],
            ['code' => 'PAB', 'name' => 'Panamanian Balboa'],
            ['code' => 'PEN', 'name' => 'Peruvian Nuevo Sol'],
            ['code' => 'PHP', 'name' => 'Philippine Peso'],
            ['code' => 'PKR', 'name' => 'Pakistan Rupee'],
            ['code' => 'PLN', 'name' => 'Polish Zloty'],
            ['code' => 'RON', 'name' => 'Romanian New Lei'],
            ['code' => 'RSD', 'name' => 'Serbian Dinar'],
            ['code' => 'RUB', 'name' => 'Russian Rouble'],
            ['code' => 'SEK', 'name' => 'Swedish Krona'],
            ['code' => 'SGD', 'name' => 'Singapore Dollar'],
            ['code' => 'THB', 'name' => 'Thai Baht'],
            ['code' => 'TND', 'name' => 'Tunisian Dinar'],
            ['code' => 'TRY', 'name' => 'Turkish Lira'],
            ['code' => 'TTD', 'name' => 'Trinidad/Tobago Dollar'],
            ['code' => 'TWD', 'name' => 'Taiwan Dollar'],
            ['code' => 'USD', 'name' => 'US Dollar'],
            ['code' => 'VEF', 'name' => 'Venezuelan Bolivar Fuerte'],
            ['code' => 'VND', 'name' => 'Vietnamese Dong'],
            ['code' => 'XAF', 'name' => 'CFA Franc BEAC'],
            ['code' => 'XCD', 'name' => 'East Caribbean Dollar'],
            ['code' => 'XPF', 'name' => 'CFP Franc'],
            ['code' => 'ZAR', 'name' => 'South African Rand'],
        ];
    }
}
