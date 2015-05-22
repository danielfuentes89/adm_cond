<?php
class usuarios extends ActiveRecord{
    /**
    * Muestra los usuarios de cinco en cinco utilizando paginador
    *
    * @param int $page
    * @return object
    **/
   public function ver($page=1)
   {
       return $this->paginate("page: $page", 'per_page: 10');
   }

}
?>