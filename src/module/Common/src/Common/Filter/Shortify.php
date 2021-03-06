<?php
/**
 * Athene2 - Advanced Learning Resources Manager
 *
 * @author      Aeneas Rekkas (aeneas.rekkas@serlo.org)
 * @license     MIT License
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @link        https://github.com/serlo-org/athene2 for the canonical source repository
 */
namespace Common\Filter;

use Zend\Filter\FilterInterface;

class Shortify implements FilterInterface
{
    /*
     * A collection of stop words can be found for example on
     * https://code.google.com/p/stop-words/
     *
     * Please use the smallest possible bundle for a language
     */
    static $stopWords = [
        'en' => [
            'I', 'a', 'about', 'an',
            'are', 'as', 'at', 'be',
            'by', 'com', 'for', 'from',
            'how', 'in', 'is', 'it',
            'of', 'on', 'or', 'that',
            'the', 'this', 'to', 'was',
            'what', 'when', 'where', 'who',
            'will', 'with', 'the', 'www'
        ],
        'de' => [
            'aber', 'als', 'am', 'an', 'auch', 'auf', 'aus', 'bei',
            'bin', 'bis', 'bist', 'da', 'dadurch', 'daher', 'darum', 'das',
            'da', 'dass', 'dein', 'deine', 'dem', 'den', 'der', 'des',
            'dessen', 'deshalb', 'die', 'dies', 'dieser', 'dieses', 'doch', 'dort',
            'du', 'durch', 'ein', 'eine', 'einem', 'einen', 'einer', 'eines', 'er',
            'es', 'euer', 'eure', 'für', 'hatte', 'hatten', 'hattest', 'hattet',
            'hier', 'hinter', 'ich', 'ihr', 'ihre', 'im', 'in', 'ist',
            'ja', 'jede', 'jedem', 'jeden', 'jeder', 'jedes', 'jener', 'jenes',
            'jetzt', 'kann', 'kannst', 'können', 'könnt', 'machen', 'mein', 'meine',
            'mit', 'muß', 'mußt', 'musst', 'müssen', 'müßt', 'nach', 'nachdem',
            'nein', 'nicht', 'nun', 'oder', 'seid', 'sein', 'seine', 'sich',
            'sie', 'sind', 'soll', 'sollen', 'sollst', 'sollt', 'sonst', 'soweit',
            'sowie', 'und', 'unser', 'unsere', 'unter', 'vom', 'von', 'vor',
            'wann', 'warum', 'was', 'weiter', 'weitere', 'wenn', 'wer', 'werde',
            'werden', 'werdet', 'weshalb', 'wie', 'wieder', 'wieso', 'wir',
            'wird', 'wirst', 'wo', 'woher', 'wohin', 'zu', 'zum', 'zur', 'über'
        ]
    ];

    static $regex = null;

    /**
     * @return string
     */
    static protected function getRegex() {
        if (self::$regex === null) {
            $words = '';
            foreach (self::$stopWords as $lang) {
                if (!empty($words)) {
                    $words .= '|';
                }
                $words .= implode('|', $lang);
            }

            self::$regex = '@[\W_]+(' . $words . ')[\W_]+@isU';
        }
        return self::$regex;
    }

    /**
     * @param string $text
     * @return bool|mixed
     */
    static protected function shortify($text)
    {
        $text = preg_replace(self::getRegex(), ' ', $text);
        return trim($text);
    }

    /**
     * {@inheritDoc}
     */
    public function filter($value)
    {
        return self::shortify($value);
    }
}
