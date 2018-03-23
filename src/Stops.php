<?php
namespace TPGwidget\Data;

class Stops {
    const STOP_NAMES_CORRECTIONS = [
        'Gare Eaux-Vives' => 'Gare des Eaux-Vives',
        'Ziplo' => 'ZIPLO',
        'De stael' => 'De-Staël',
        'Palettes - armes' => 'Palettes - Armes',
        'Jar.-Botanique' => 'Jardin Botanique',
        'Bachet' => 'Bachet-de-Pesay',
        'Palettes bachet' => 'Palettes - Bachet',
        'Onex-cite' => 'Onex-Cité',
        'Lignon' => 'Lignon-Tours',
        'Carouge' => 'Carouge-Rondeau',
        'Carouge (Rondeau)' => 'Carouge-Rondeau',
        'Thonex-vallard' => 'Thônex-Vallard',
        'Th-Vallard-Dne' => 'Thônex-Vallard',
        'Place de neuve' => 'Place de Neuve',
        'Champel' => 'Crêts-de-Champel',
        'Neydens-vitam' => 'Neydens-Vitam',
        'Vernier' => 'Vernier-Village',
        'Champel' => 'Crêts-de-Champel',
        'P+R Etoile' => 'P+R Étoile',
        'Oms' => 'OMS',
        'P+r veigy' => 'P+R Veigy',
        'P bernex' => 'P+R Bernex',
        'Puplinge-mairie' => 'Puplinge-Mairie',
        'Veyrier-Tournet.' => 'Veyrier-Tournettes',
        'Palettes-Bachet' => 'Palettes - Bachet',
        'Cs la becassiere' => 'CS La Bécassière',
        'Annemasse-gare' => 'Annemasse-Gare',
        'Annemasse gare' => 'Annemasse-G. EXPRESS',
        'Ecole medecine' => 'École-de-Médecine',
        'Hopital la tour' => 'Hôpital de la Tour',
        'Loëx-hôpital' => 'Loëx-Hôpital',
        'C.o Renard' => 'CO Renard',
        'Co renard' => 'CO Renard',
        'Challex-la halle' => 'P+R Challex-La Halle',
        'Sezenove' => 'Sézenove',
        'Emile zola' => 'Émile Zola',
        'Hopitaux' => 'Hôpitaux',
        'Lancy-hubert' => 'Lancy-Hubert',
        'Lancy - hubert' => 'Lancy-Hubert',
        'Coll.Claparède' => 'Collège Claparède',
        'Pl. Eaux-Vives' => 'Place des Eaux-Vives',
        'La plaine-gare' => 'La Plaine-Gare',
        'Gd-Saconnex-Place' => 'Grand-Saconnex-Place',
        'Gd-Saconnex-Douane' => 'Grand-Saconnex-Douane',
        'Gd-Saconnex-Mairie' => 'Grand-Saconnex-Mairie',
        'Hôpital la Tour' => 'Hôpital de La Tour',
        'Jardin-Alpin-Vi.' => 'Jardin-Alpin-Vivarium',
        'Aeroport-p47' => 'Aéroport-P47',
        'Vernier-Parf.' => 'Vernier-Parfumerie',
        'Les esserts' => 'Les Esserts',
        'Jardin botanique' => 'Jardin Botanique',
        'Ste-Clotilde' => 'Sainte-Clotilde',
    ];
    
    public static function correct(string $stopName): string
    {
        return self::STOP_NAMES_CORRECTIONS[$stopName] ?? $stopName;
    }
}
