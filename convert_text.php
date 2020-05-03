<?php

class TranslateText{
    public static function convertText($text)
    {
        switch ($text) {
            case "wings":
                return "Boneless Wings and Skins Sampler";
            case "nachos":
                return "Three Cheese Nachos";
            case "dip":
                return "Spinach Artichoke Dip";
            case "quesadilla":
                return "Santa Fe Chicken Quesadilla";
            case "chips":
                return "Chips and Salsa";
            case "calamari":
                return "Fried Calamari";
            case "pastrami":
                return "Pastami Sandwich";
            case "panini":
                return "Roasted Turkey & Avocado BLT Panini";
            case "reuben":
                return "Reuben Sandwich";
            case "vegetarian":
                return "Vegetarian Sandwich";
            default:
                return $text;
        }
    }
}
?>