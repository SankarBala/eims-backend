<?php

require_once("ExcelHelper.php");



// class Pager
// {
//   public static function paginate(Collection $collection, $pageSize = 15)
//   {
//     $page = Paginator::resolveCurrentPage('page');
//     $total = $collection->count();
//     return self::paginator($collection->forPage($page, $pageSize), $total, $pageSize, $page, [
//       'path' => Paginator::resolveCurrentPath(),
//       'pageName' => 'page'
//     ]);
//   }

//   protected static function paginator($items, $total, $perPage, $currentPage, $options)
//   {
//     return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
//       'items',
//       'total',
//       'perPage',
//       'currentPage',
//       'options'
//     ));
//   }
// }
