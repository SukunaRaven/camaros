<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
            Schema::table('camaros', function (Blueprint $table) {
                //BASIC FEATURES
                $table->string('new_fiscal_price')->nullable();
                $table->string('new_ready_price')->nullable();
                $table->string('delivery_costs')->nullable();
                $table->string('road_tax')->nullable();
                $table->string('classification')->nullable();
                $table->string('body')->nullable();
                $table->integer('seats')->nullable();
                $table->string('gearbox')->nullable();
                $table->string('segment')->nullable();
                $table->string('energy_label')->nullable();
                $table->string('additional_tax')->nullable();
                $table->string('introduction')->nullable();
                $table->string('end')->nullable();

                //ENGINE
                $table->string('powertrain')->nullable();
                $table->string('powertrain_type')->nullable();
                $table->string('max_total_power')->nullable();
                $table->string('max_total_torque')->nullable();
                $table->string('drive')->nullable();

                //FUEL ENGINE
                $table->integer('cylinders')->nullable();
                $table->integer('valves_per_cylinder')->nullable();
                $table->string('displacement')->nullable();
                $table->string('bore_stroke')->nullable();
                $table->string('compression_ratio')->nullable();
                $table->string('max_power')->nullable();
                $table->string('max_torque')->nullable();
                $table->string('fuel_system')->nullable();
                $table->string('valve_control')->nullable();
                $table->string('turbocharger')->nullable();
                $table->string('catalytic_converter')->nullable();
                $table->string('fuel_tank')->nullable();
                $table->string('rpm_100')->nullable();
                $table->string('rpm_130')->nullable();
            });
    }

    public function down(): void
    {
        Schema::table('camaros', function (Blueprint $table) {
            $table->dropColumn([
                //BASIC FEATURES
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

                //ENGINE
                'powertrain',
                'powertrain_type',
                'max_power',
                'max_torque',
                'drive',

                //FUEL ENGINE
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
            ]);

        });
    }

};
