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
       $sql = "select * from usuarios where usro_id !=".Session::get("id");
       return $this->paginate_by_sql($sql);
   }

}
?>