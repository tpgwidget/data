<?php

namespace TPGwidget\Data;

use PHPUnit\Framework\TestCase;

/**
 * Test that tpgwidget/data is compatible with December 2018 TPG network changes.
 */
class December2018Tests extends TestCase
{
    /** @test */
    public function it_should_format_new_2019_stop_names() {
        $replacements = [
            'Versoix-scie' => 'Versoix-La Scie',
            'Vesoix-C. sportif' => 'Versoix-Centre sportif',

            'Thoiry-cc' => 'Thoiry-<small>Centre commercial</small>',
            'Thoiry-Centre-Comm.' => 'Thoiry-<small>Centre commercial</small>',
            'Thoiry' => 'Thoiry-<small>Centre commercial</small>',

            'Thoiry-Pl. d\'Allemog' => 'Thoiry-<small>Place d\'Allemogne</small>',
            'Thoiry-Pl. en Poulet' => 'Thoiry-<small>Place en Poulet</small>',
            'St-Genis-CERN-Alice' => 'St-Genis-CERN Alice',
            'St-Genis-Po. France' => 'St-Genis-<small>Porte de France</small>',

            'Prévessin-Le Joran' => '<small>Prévessin-</small>Collège Le Joran',
            'Prévessin-Möens-Mair' => 'Prévessin-Möens-Mairie',
            'Prévessin-Hauts-Magn' => '<small>Prévessin-</small>Hauts-de-Magny',
            'Avenue de vessy' => 'Ferney-<small>Avenue de Vessy</small>',
            'Ferney-Planche-Brûlé' => 'Ferney-Planche-Brûlée',
            'Ferney-Jura (Volt.)' => 'Ferney-Av. du Jura <small>(av. Voltaire)</small>',

            'Maison Parlements' => 'Maison des Parlements',

            'Genthod' => 'Genthod-le-Haut',
            'Genthod-Bellev.-Gare' => 'Genthod-Bellevue-Gare',

            'Aerobus' => 'Aérobus',
        ];

        foreach ($replacements as $wrongName => $replacement) {
            $this->assertEquals($replacement, Stops::format($wrongName));
        }
    }

    /** @test */
    public function it_should_know_new_sbb_stop_names() {
        $sbbStops = [
            'Grand-Saconnex, Arena-Halle 7',
            'Ferney, Levant',
            'Ferney, Lycée',
            'Ferney, Avenue de Vessy',
            'Prévessin, Terraillet',
            'Prévessin, Hauts-de-Magny',
            'Prévessin, Collège Le Joran',
            'Saint-Genis, Schumann',
            'Saint-Genis, Porte de France',
            'Saint-Genis, Lion',
            'Saint-Genis, théâtre',
            'Saint-Genis, Clos des Vignes',
            'Thoiry, Pôle emploi',
            'Thoiry, centre commercial',
            'Prévessin, Parc des Anneaux',
            'Prévessin, Ancienne Douane',
            'Prévessin, Bretonnière',
            'Prévessin, Les Aglands',
            'Versoix, La Scie',
            'Genthod, le Haut',
            'Genthod, Pierre-Grise',
            'Genthod, Rennex',
            'Bellevue GE, mairie',
            'Bellevue GE, Mollies',
            'Bellevue GE, Roselière',
            'Les Tuileries, gare',

            'Grand-Saconnex, Sonnex',
            'Satigny, Bergère',

            'Versoix, centre sportif',
            'Genève-Sécheron',
            'Chambésy',
            'Les Tuileries',
            'Genthod-Bellevue',
            'Creux-de-Genthod',
            'Pont-Céard',
        ];

        $dataset = Datasets::load('stopTranslation');
        foreach ($sbbStops as $sbbStop) {
            $this->assertArrayHasKey($sbbStop, $dataset);
        }
    }
}
