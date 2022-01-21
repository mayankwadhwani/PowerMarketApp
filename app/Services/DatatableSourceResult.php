<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DatatableSourceResult
{

    protected $query;
    protected $data_count;
    protected $requestData;

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\Relation $query
     */
    public function __construct(Request $request, $query)
    {
        $request->validate([
            'columns' => ['array'],
            'columns.*' => ['array'],
            'columns.*.data' => ['string'],
            'columns.*.name' => ['nullable', 'string'],
//            'columns.*.searchable' => ['boolean'],
//            'columns.*.orderable' => ['boolean'],
            'order' => ['array'],
            'order.*' => ['array'],
            'order.*.column' => ['integer'],
            'order.*.dir' => ['string'],
            'start' => ['required', 'integer'],
            'length' => ['required', 'integer'],
            ''
        ]);
        $this->requestData = $request->all();

        $this->query = $this->init_query = $query;

    }


    public function response()
    {
        $this->buildQuery();

        $c = $this->getDataCount();
        return response()->json([
            'data' => $this->getData(),
            'recordsTotal' => $c,
            'recordsFiltered' => $c,
        ]);
    }


    protected function buildQuery()
    {
        $this->processSearch();
        foreach ($this->requestData['order'] as $order) {
            $this->query->orderBy($this->requestData['columns'][$order['column']]['data'], $order['dir']);
        }
        $this->data_count = $this->query->count();
        $this->query->limit($this->requestData['length'])->offset($this->requestData['start']);
    }

    protected function processSearch()
    {
        if (!empty($this->requestData['search']['value'])) {
            $s = '%' . $this->requestData['search']['value'] . '%';
            $this->query->where(function (Builder $builder) use ($s) {
                $method = 'where';
                foreach ($this->requestData['columns'] as $data) {
                    if (!empty($data['data'])) {
                        $builder->{$method}($data['data'], 'like', $s);
                    }
                    $method = 'orWhere';
                }
            });
        }
        return $this->query->get();
    }

    protected function getData()
    {
        return $this->query->get();
    }

    protected function getDataCount()
    {
        return $this->data_count;
    }

}