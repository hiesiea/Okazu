<?php

    /**
     * おかず生成クラス
     */
    class OkazuGenerator
    {
        const URL_ERRY = 'http://erry.one/video/';
        const URL_SUGIRL = 'https://sugirl.info/video/';
        const URL_SEPARATOR = '/';
        const PROMPT_OKAZU = '「おかず」って言ってくれたらいいものあげるよ♪';

        /**
         * おかずをランダムに返す
         */
        public static function replyOkazu()
        {
            if (rand(0, 1) === 0) {
                return OkazuGenerator::URL_SUGIRL . rand(23000, 25515) . OkazuGenerator::URL_SEPARATOR;
            } else {
                return OkazuGenerator::URL_ERRY . rand(16000, 18770) . OkazuGenerator::URL_SEPARATOR;
            }
        }

        /**
         * おかずの催促
         */
        public static function replyPromptOkazu()
        {
            return OkazuGenerator::PROMPT_OKAZU;
        }
    }

?>
