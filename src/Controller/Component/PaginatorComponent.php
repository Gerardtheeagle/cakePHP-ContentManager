<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Datasource\Paging\SimplePaginator;

class PaginatorComponent extends Component
{
    public function paginate($query, array $options = [])
    {
        $paginator = new SimplePaginator();
        // Définir les options de pagination
        $options = array_merge([
            'limit' => 5, // Nombre d'éléments par page
            'order' => ['created' => 'desc'], // Tri par défaut
        ], $options);

        // Appliquer les options de pagination
        $result = $paginator->paginate($query, $options);

        return $result;
    }
}