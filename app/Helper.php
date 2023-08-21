<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Pusher\Pusher;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;


class Helper
{
    public static function jsonResponse($code, $message, $data = null)
    {
        if (empty($message)) {
            if ($code == Constant::SUCCESS) {
                $message = "Success";
            } else if ($code == Constant::RESOURCE_NOT_FOUND) {
                $message = "Resource not found";
            } else if ($code == Constant::NOT_MODIFIED) {
                $message = "Not modified";
            }
        }
        $response = [
            'code' => $code,
            'message' => $message ? [$message] : ""
        ];

        if ($data) {
            $response['data'] = $data;
        }
        return response()->json($response);
    }

    public static function getInitialsName($name)
    {
        $nameParts = explode(' ', trim($name));
        $firstName = array_shift($nameParts);
        $lastName = array_pop($nameParts);
        $initials = mb_substr($firstName, 0, 1) . mb_substr($lastName, 0, 1);

        return $initials;
    }

    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function ConvertNoun($word,$plural_nouns = false) {
        $specalEndByOCharacter = ['piano', 'photo'];
        $specalWord = [
        "foot" => "feet",
        "tooth" => "teeth",
        "goose" => "geese",
        "ox" => "oxen",
        "fish" => "fish",
        "sheep" => "sheep",
        "mouse" => "mice",
        "woman" => "women",
        "man" => "men",
        "child" => "children",
        "person" => "people",
        "clothes" => "clothes",
        "police" => "police",
        "outskirts" => "outskirts",
        "cattle" => "cattle",
        "spectacles" => "spectacles",
        "glasses" => "glasses",
        "binoculars" => "binoculars",
        "scissors" => "scissors",
        "pliers" => "pliers",
        "shears" => "shears",
        "arms" => "arms",
        "goods" => "goods",
        "wares" => "wares",
        "damages" => "damages",
        "greens" => "greens",
        "earnings" => "earnings",
        "grounds" => "grounds",
        "particulars" => "particulars",
        "premises" => "premises",
        "quarters" => "quarters",
        "riches" => "riches",
        "savings" => "savings",
        "stairs" => "stairs",
        "surroundings" => "surroundings",
        "valuables" => "valuables",
        "spirits" => "spirits",
        "spirits" => "spirits",
        "acoustics" => "acoustics",
        "athletics" => "athletics",
        "ethics" => "ethics",
        "hysterics" => "hysterics",
        "mathematics" => "mathematics",
        "physics" => "physics",
        "linguistics" => "linguistics",
        "phonetics" => "phonetics",
        "logistics" => "logistics",
        "technics" => "technics",
        "politics" => "sppoliticsirits",
        "news" => "news",
        "mumps" => "mumps",
        "measles" => "measles",
        "rickets" => "rickets",
        "shingles" => "shingles",
        "billiards" => "billiards",
        "darts" => "darts",
        "draughts" => "draughts",
        "bowls" => "bowls",
        "dominoe" => "dominoe",
        "spirits" => "spirits",
        ];
        $word = strtolower($word);
        $word = trim($word);
        if($plural_nouns == true) {
            if (!array_key_exists($word,$specalWord )) {
                $suffix = "s";
                if (substr($word, -1) === "y") {
                    $word = substr($word, 0, -1);
                    $suffix = "ies";
                } elseif (substr($word, -1) === "f" ){
                    $word = substr($word, 0, -1);
                    $suffix = "ves";
                } elseif (substr($word, -2, 2) === "fe" ){
                    $word = substr($word, 0, -2);
                    $suffix = "ves";
                } elseif (substr($word, -2, 2) === "ch"
                    || substr($word, -2, 2) === "sh"
                    || substr($word, -2, 2) === "ss"
                    || substr($word, -1) === "s"
                    || substr($word, -1) === "x"
                    || (substr($word, -1) === "o" && !in_array($word, $specalEndByOCharacter)) ){
                    $suffix = "es";
                } elseif (substr($word, -1) === "z"){
                    $suffix = "zes";
                }
                $word =  Helper::upperFirstKeyword($word);
                return $word.$suffix;
            }
            $word =  Helper::upperFirstKeyword($specalWord[$word]);
            return $word;
        }
        $word =  Helper::upperFirstKeyword($word);
        return $word;
    }

    public static function upperFirstKeyword($word){
        $word[0] = strtoupper($word[0]);
        return $word;
    }

}
