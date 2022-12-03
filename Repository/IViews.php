<?php
    namespace Repository;

    use Models\Company as Company;

    interface IViews
    {
        function Add( $element);
        function GetAll();
    }
?>