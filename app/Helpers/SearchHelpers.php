<?php

namespace App\Helpers;

use App\Models\Apartment;
use App\Models\Land;
use Illuminate\Support\Facades\DB;

class SearchHelpers
{
    /**
     * Calculate the Levenshtein distance between two strings.
     *
     * @param string $str1
     * @param string $str2
     * @return int
     */
    public static function levenshteinDistance($str1, $str2)
    {
        return levenshtein(mb_strtolower($str1), mb_strtolower($str2));
    }

    /**
     * Get an array of synonyms.
     *
     * @return array
     */
    public static function getSynonyms()
    {
        return [
            // Property Types
            'شقة' => ['شقه', 'شقق', 'apartment', 'flat', 'unit', 'condo', 'دار', 'مسكن'],
            'منزل' => ['بيت', 'مسكن', 'home', 'residence', 'فيلا', 'villa', 'دور'],
            'أرض' => ['ارض', 'قطعة', 'قطعة أرض', 'land', 'lot', 'plaza', 'مزرعة'],
            'مبنى' => ['عمارة', 'بناية', 'building', 'برج', 'tower', 'مجمع'],

            // Property Status
            'للبيع' => ['بيع', 'متاح للبيع', 'sale', 'for sale', 'شراء', 'مطلوب للبيع'],
            'للإيجار' => ['إيجار', 'متاح للإيجار', 'rent', 'for rent', 'استئجار', 'مطلوب للإيجار'],

            // Rooms
            'غرفة' => ['غرف', 'غرفه', 'room', 'rooms', 'نوم', 'نومه'],

            // Bathrooms
            'حمام' => ['حمامات', 'حمام', 'bathroom', 'bathrooms', 'دورة مياه', 'دورات مياه'],

            // Price
            'سعر' => ['قيمة', 'ثمن', 'price', 'cost', 'budget', 'مبلغ'],

            // Area
            'مساحة' => ['مساحه', 'area', 'size', 'مساحة الأرض', 'متمساحة', 'متر'],

            // Features
            'مسبح' => ['حمام سباحة', 'بركة', 'pool', 'swimming pool', 'بسين'],
            'حديقة' => ['حديقه', 'garden', 'yard', 'جنينة'],
            'موقف سيارات' => ['موقف', 'مواقف', 'parking', 'garage', 'كراج'],
            'مصعد' => ['اسانسير', 'elevator', 'lift'],
            'تكييف' => ['مكيف', 'تكييف مركزي', 'air conditioning', 'AC'],

            // Yemeni Cities (Only existing cities)
            'صنعاء' => ['صنعاء', 'sana\'a', 'sanaa', 'sana'],
            'عدن' => ['عدن', 'aden'],
            'تعز' => ['تعز', 'taiz'],
            'حضرموت' => ['حضرموت', 'hadrmout', 'hadhramaut'],
            'الحديدة' => ['الحديدة', 'hodeidah', 'hodeida'],
            'إب' => ['إب', 'اب', 'ibb'],
            'الجوف' => ['الجوف', 'al-jawf'],
            'شبوة' => ['شبوة', 'shabwah'],
            'المحويت' => ['المحويت', 'al-mahwit'],
            'ذمار' => ['ذمار', 'dhamar'],
            'حجة' => ['حجة', 'hajjah'],
            // Add more cities as needed
        ];
    }

    /**
     * Get a list of Arabic stop words.
     *
     * @return array
     */
    public static function getStopWords()
    {
        return [
            'في', 'على', 'من', 'إلى', 'عن', 'مع', 'هذا', 'هذه', 'ذلك', 'تلك', 'ما', 'ماذا', 'لماذا', 'هل', 'هو', 'هي', 'هم', 'هن',
            'أنا', 'نحن', 'أنت', 'أنتم', 'أنتن', 'الذي', 'التي', 'الذين', 'اللاتي', 'اللاتي', 'و', 'أو', 'لكن', 'إذا', 'لأن', 'كما',
            'حتى', 'ثم', 'حيث', 'أي', 'أين', 'كيف', 'لم', 'لا', 'لن', 'ليس', 'إن', 'أن', 'إذن', 'إلا', 'ب', 'ك', 'ل', 'ال',
            'هناك', 'هنا', 'كل', 'فيه', 'فيها', 'عند', 'أيضاً', 'ايضا', 'قد', 'لقد', 'مازال', 'ما زال', 'ما يزال',
            // Add more stop words as needed
        ];
    }

    /**
     * Reduce a word to its base form (advanced stemming).
     *
     * @param string $word
     * @return string
     */
    public static function stemWord($word)
    {
        // Remove prefixes
        $prefixes = ['ال', 'و', 'ف', 'ب', 'ك', 'ل', 'لل', 'من'];
        foreach ($prefixes as $prefix) {
            if (mb_substr($word, 0, mb_strlen($prefix)) === $prefix) {
                $word = mb_substr($word, mb_strlen($prefix));
                break;
            }
        }

        // Remove suffixes
        $suffixes = ['ه', 'ها', 'ك', 'ي', 'ية', 'ين', 'ون', 'ات', 'ان', 'تان', 'تين', 'هما', 'نا', 'كم', 'هم', 'هن', 'ا', 'وا', 'ون'];
        foreach ($suffixes as $suffix) {
            if (mb_substr($word, -mb_strlen($suffix)) === $suffix) {
                $word = mb_substr($word, 0, -mb_strlen($suffix));
                break;
            }
        }

        // Handle specific morphological patterns
        $patterns = [
            '/مزارع$/u' => 'زارع',
            '/مؤجر$/u' => 'أجر',
            '/مؤجرة$/u' => 'أجر',
            // Add more patterns as needed
        ];
        foreach ($patterns as $pattern => $replacement) {
            if (preg_match($pattern, $word)) {
                $word = preg_replace($pattern, $replacement, $word);
                break;
            }
        }

        return $word;
    }

    /**
     * Get a list of Yemeni city names.
     *
     * @return array
     */
    public static function getCitiesList()
    {
        return [
            'صنعاء',
            'عدن',
            'تعز',
            'حضرموت',
            'الحديدة',
            'إب',
            'الجوف',
            'شبوة',
            'المحويت',
            'ذمار',
            'حجة',
            // Add more cities as needed
        ];
    }

    /**
     * Get a list of available features.
     *
     * @return array
     */
    public static function getFeaturesList()
    {
        // Assuming features are stored in the database
        // Fetch feature names and convert to lowercase
        return DB::table('features')->pluck('name')->map(function ($name) {
            return mb_strtolower($name);
        })->unique()->toArray();
    }

    /**
     * Tokenize the input text more effectively for Arabic.
     *
     * @param string $text
     * @return array
     */
    public static function tokenize($text)
    {
        // Normalize text: remove diacritics and punctuation
        $text = preg_replace('/[ًٌٍَُِْ]/u', '', $text); // Remove diacritics
        $text = preg_replace('/[^\p{Arabic}\s]/u', ' ', $text); // Remove non-Arabic characters except spaces

        // Split by whitespace
        $tokens = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);

        return $tokens;
    }

    /**
     * Get trigrams of a word.
     *
     * @param string $word
     * @return array
     */
    public static function getTrigrams($word)
    {
        $word = " " . $word . " ";
        $trigrams = [];
        $length = mb_strlen($word);
        for ($i = 0; $i < $length - 2; $i++) {
            $trigram = mb_substr($word, $i, 3);
            $trigrams[] = $trigram;
        }
        return $trigrams;
    }

    /**
     * Calculate trigram similarity between two words.
     *
     * @param string $word1
     * @param string $word2
     * @return float
     */
    public static function trigramSimilarity($word1, $word2)
    {
        $trigrams1 = self::getTrigrams($word1);
        $trigrams2 = self::getTrigrams($word2);

        $common = array_intersect($trigrams1, $trigrams2);
        $total = count($trigrams1) + count($trigrams2);

        if ($total == 0) return 0.0;

        return (2.0 * count($common)) / $total;
    }

    /**
     * Calculate cosine similarity between two vectors.
     *
     * @param array $vecA
     * @param array $vecB
     * @return float
     */
    public static function cosineSimilarity($vecA, $vecB)
    {
        $dot = 0.0;
        $normA = 0.0;
        $normB = 0.0;
        $length = min(count($vecA), count($vecB));

        for ($i = 0; $i < $length; $i++) {
            $dot += $vecA[$i] * $vecB[$i];
            $normA += $vecA[$i] * $vecA[$i];
            $normB += $vecB[$i] * $vecB[$i];
        }

        if ($normA == 0 || $normB == 0) return 0.0;

        return $dot / (sqrt($normA) * sqrt($normB));
    }

    /**
     * Simulate semantic embedding for a given text.
     * (Note: Without external libraries, this function simulates embedding generation.)
     *
     * @param string $text
     * @return array
     */
    public static function getSemanticEmbedding($text)
    {
        // Placeholder for embedding. In reality, embeddings require machine learning models.
        // Here, we'll simulate with a hash-based vector for demonstration.
        $hash = md5($text);
        $embedding = [];
        for ($i = 0; $i < 16; $i++) {
            $chunk = substr($hash, $i * 2, 2);
            $embedding[] = hexdec($chunk) / 255.0; // Normalize between 0 and 1
        }
        return $embedding;
    }

       /**
     * Calculate a relevance score for an advertisement based on the search parameters.
     *
     * @param \App\Models\Advertisement $ad
     * @param array $searchParams
     * @return int
     */
    public static function scoreAdvertisement($ad, $searchParams)
    {
        $score = 0;
        $keywords = $searchParams['keywords'];
        $filters = $searchParams['filters'];

        // Define weights
        $weights = [
            'keyword_match' => 10,
            'keyword_fuzzy_match' => 5,
            'trigram_similarity' => 5, // Additional weight for trigram similarity
            'price_match' => 10,
            'status_match' => 8,
            'property_type_match' => 12,
            'city_match' => 7,
            'feature_match' => 3,
            'rooms_number_match' => 6,
            'bathrooms_number_match' => 4,
            'area_match' => 5,
        ];

        // Combine advertisement text fields
        $adText = mb_strtolower($ad->title . ' ' . ($ad->realEstate->description ?? ''));
        $adTokens = self::tokenize($adText);

        // Increase score for each keyword match
        foreach ($keywords as $keyword) {
            if (in_array($keyword, $adTokens)) {
                $score += $weights['keyword_match'];
            } else {
                // Fuzzy match using Levenshtein distance
                foreach ($adTokens as $word) {
                    $distance = self::levenshteinDistance($keyword, $word);
                    if ($distance <= 2) { // Allow up to 2 edits
                        $score += $weights['keyword_fuzzy_match'];
                        break;
                    }
                }

                // Trigram similarity
                foreach ($adTokens as $word) {
                    $similarity = self::trigramSimilarity($keyword, $word);
                    if ($similarity > 0.5) { // Threshold can be adjusted
                        $score += $weights['trigram_similarity'];
                        break;
                    }
                }
            }
        }

        // Adjust score based on filters

        // Price filter
        if (isset($filters['min_price']) && isset($filters['max_price'])) {
            $price = $ad->realEstate->price ?? 0;
            if ($price >= $filters['min_price'] && $price <= $filters['max_price']) {
                $score += $weights['price_match'];
            }
        }

        // Status filter
        if (isset($filters['status'])) {
            $status = mb_strtolower($ad->realEstate->status ?? '');
            if ($status === $filters['status']) {
                $score += $weights['status_match'];
            }
        }

        // Property type filter
        if (isset($filters['property_type'])) {
            $propertyType = mb_strtolower(class_basename($ad->realEstate->realEstateable));
            if (in_array($propertyType, array_map('mb_strtolower', $filters['property_type']))) {
                $score += $weights['property_type_match'];
            }
        }

        // City filter
        if (isset($filters['city'])) {
            $cityName = mb_strtolower($ad->realEstate->city->name ?? '');
            if (in_array($cityName, array_map('mb_strtolower', $filters['city']))) {
                $score += $weights['city_match'];
            }
        }

        // Features filter
        if (isset($filters['features']) && $ad->realEstate->features) {
            $adFeatures = $ad->realEstate->features->pluck('name')->map(function ($name) {
                return mb_strtolower($name);
            })->toArray();

            foreach ($filters['features'] as $feature) {
                if (in_array(mb_strtolower($feature), $adFeatures)) {
                    $score += $weights['feature_match'];
                }
            }
        }

        // Rooms number filter
        if (isset($filters['rooms_number'])) {
            $roomsNumber = null;
            if ($ad->realEstate->realEstateable instanceof Apartment) {
                $roomsNumber = $ad->realEstate->realEstateable->rooms_number;
            }

            if ($roomsNumber !== null && $roomsNumber == $filters['rooms_number']) {
                $score += $weights['rooms_number_match'];
            }
        }

        // Bathrooms number filter
        if (isset($filters['bathrooms_number'])) {
            $bathroomsNumber = null;
            if ($ad->realEstate->realEstateable instanceof Apartment) {
                $bathroomsNumber = $ad->realEstate->realEstateable->bathrooms_number;
            }

            if ($bathroomsNumber !== null && $bathroomsNumber == $filters['bathrooms_number']) {
                $score += $weights['bathrooms_number_match'];
            }
        }

        // Area filter
        if (isset($filters['area'])) {
            $area = null;
            if ($ad->realEstate->realEstateable instanceof Land) {
                $area = $ad->realEstate->realEstateable->area;
            } elseif ($ad->realEstate->realEstateable instanceof Apartment) {
                $area = $ad->realEstate->realEstateable->area ?? null;
            }

            if ($area !== null && $area == $filters['area']) {
                $score += $weights['area_match'];
            }
        }

        return $score;
    }
}