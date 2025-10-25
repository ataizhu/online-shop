<?php

if (!function_exists('trans_section')) {
    function trans_section($name) {
        $translations = [
            'fr' => [
                'Beads & Stones' => 'Perles & Pierres',
                'Metal Components' => 'Composants Métalliques',
                'Chains & Cords' => 'Chaînes & Cordons',
                'Tools & Supplies' => 'Outils & Fournitures',
            ],
        ];

        $locale = app()->getLocale();
        if ($locale == 'en')
            return $name;
        return $translations[$locale][$name] ?? $name;
    }
}

if (!function_exists('trans_category')) {
    function trans_category($name) {
        $translations = [
            'fr' => [
                'Glass Beads' => 'Perles de Verre',
                'Gemstone Beads' => 'Perles Gemmes',
                'Crystal Beads' => 'Perles Cristal',
                'Silver Findings' => 'Apprêts Argent',
                'Gold Findings' => 'Apprêts Or',
                'Ear Wires & Hooks' => 'Crochets d\'Oreille',
                'Jump Rings' => 'Anneaux de Jonction',
                'Crimp Beads' => 'Perles à Écraser',
                'Wire & Chain' => 'Fil & Chaîne',
            ],
        ];

        $locale = app()->getLocale();
        if ($locale == 'en')
            return $name;
        return $translations[$locale][$name] ?? $name;
    }
}

if (!function_exists('__j')) {
    function __j($key) {
        return __('jewelry.' . $key);
    }
}

