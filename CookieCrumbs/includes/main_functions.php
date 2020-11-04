<?php 
    if(!class_exists('MasterTemplate'))
    {
        class MasterTemplate
        {
            /*public function navigation($links_array, $class)
            {
                $nav = '<div class="'.$class.'">';
                foreach($links_array as $item){
                    $nav .= '<div id="link">
                        <a href="'.$item['url'].'">'.$item['text'].'</a>
                    </div>
                    ';
                }

                return $nav.'
            </div>
                ';
            }*/
            public function navigation($images_array, $class)
            {
                $nav = '<div class="'.$class.'">';
                foreach($images_array as $item){
                    $nav .= '<div id="link">
                        <img src="'.$item['src'].'"a href="'.$item['url'].'">
                    </div>
                    ';
                }

                return $nav;
            }
        }
    }

    $dtm = new MasterTemplate;
?>