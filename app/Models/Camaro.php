<?php

namespace App\Models;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camaro extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'description',
        'category_id',
        'image',

        // Pricing and taxes
        'fiscal_price',
        'ready_to_drive_price',
        'delivery_costs',
        'road_tax',
        'classification',
        'body',
        'seats',
        'gearbox',
        'segment',
        'energy_label',
        'additional_tax',
        'introduction',
        'end',

        // Engine / Powertrain
        'powertrain',
        'powertrain_type',
        'max_power',
        'max_torque',
        'drive',

        // Fuel engine details
        'cylinders',
        'valves_per_cylinder',
        'engine_capacity',
        'bore_stroke',
        'compression_ratio',
        'max_power',
        'max_torque',
        'fuel_system',
        'valve_control',
        'turbo',
        'catalytic_converter',
        'fuel_tank',
        'rpm_100',
        'rpm_130',
    ];

    // Relatie naar User (uploader)
    public function uploader(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relatie naar Category
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


}
