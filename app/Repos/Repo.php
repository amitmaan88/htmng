<?php

namespace App\Repos;

use Carbon\Carbon;
//use Hfa\Jobs\DatabaseWriteJob;

abstract class Repo
{
    /**
     * The model that is being used
     *
     * @var object
     */
    protected $model;

    /**
     * The batch to be inserted
     *
     * @var array
     */
    protected $batch;

    /**
     * Get a model or models via ID
     *
     * @param mixed $ids
     * @param array $data
     * @return Eloquent\Model
     */
    public function get($ids)
    {
        return $this->model->find($ids);
    }

    /**
     * Retrieve all models
     *
     * @return Eloquent\Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Delete a model or models
     *
     * @param mixed $ids
     * @return integer
     */
    public function delete($ids)
    {
        return $this->model->destroy($ids);
    }

    /**
     * Edit a model
     *
     * @param array $params
     * @return Eloquent\Model
     */
    public function edit($params)
    {
        extract($params);

        if (!$id) {
            $error = 'You must pass in an ID when editing [' . get_class($this->model) . ']';
            throw new \InvalidArgumentException($error);
        }

        $result = $this->model->findOrFail($id);

        $params['updated_by'] = auth()->user()->id;
        $result->update($params);

        return $this->get($result->id);
    }

    /**
     * Add a model
     *
     * @param array $params
     * @return Eloquent\Model
     */
    public function add(array $params)
    {
        $params['created_by'] = auth()->user()->id;
        $params['updated_by'] = auth()->user()->id;
        $result = $this->model->create($params);

        return $this->get($result->id);
    }

    /**
     * Add/Edit a model
     *
     * @param array $params
     * @return Eloquent\Model
     */
    public function editAdd(array $params)
    {
        extract($params);
print_r($params);        
        if (!empty($id)) {
            $params['updated_by'] = auth()->user()->id;
            $result = $this->model->findOrFail($id);
            //print_r($params);
            $result->update($params);
        }
        else {
            if(isset($params['_token'])) unset($params['_token']);
            //$params['status'] = 1;
            $params['created_by'] = auth()->user()->id;
            $result = $this->model->create($params);
        }
        return $this->get($result->id);
    }

    /**
     * Batch a model to be added later
     *
     * @param array $params
     * @return Eloquent\Model
     */
    public function batchAdd(array $params)
    {
        $this->batch[] = $params;
    }

    /**
     * Ensure any outstanding batches are flushed during
     * shutdown (may not be reliable due to Laravel intricacies
     * therefore it is recommended to call batchFlush() explicitly)
     *
     * @return void
     */
    public function __destruct()
    {
        //$this->batchFlush();
    }

    /**
     * Insert models that were batched
     *
     * @return void
     */
    public function batchFlush()
    {
        //
    }


    /**
     * Get model records that have been created from a given date
     *
     * @param  Carbon $date [description]
     * @return Eloquent\Collection
     */
    public function since(Carbon $date)
    {
        return $this->model
            ->where($this->model->getCreatedAtColumn(), '>=', $date)
            ->get();
    }

    /**
     * Return either the first that matches or create a new one.
     *
     * @param  array $data
     * @return Eloquent\Model
     */
    public function firstOrCreate($data)
    {
        $result = $this->model->firstOrCreate($data);

        return $this->get($result->id);
    }

    /**
     * Insert one or more model
     *
     * @param array $data
     * @return Mixed
     */
    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    /**
     * Return either the first that matches or fail
     *
     * @param  array $id
     * @return Eloquent\Model
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
    * Create new DB table after dropping it if exist.
    *
    * @param $tblName Table to be dropped/created
    * @param $createTblAsStmt Create table AS Statement
    *
    * @return void
    */
    public function dropAndCreateSchema($tblName, $createTblAsStmt)
    {
        app('db')->statement('DROP TABLE IF EXISTS ' . $tblName);
        app('db')->statement('CREATE TABLE ' . $tblName . ' AS '. $createTblAsStmt);
    }

	/**
     * Retrieve all models with pagination
     *
     * @return Eloquent\Collection
     */
    public function paginateX($rows = 3, $cond=array())
    {
		$records = $this->model;
        if (!empty($cond)) {
            foreach ($cond as $key => $value) {
                $records = $records->where($key, '=', $value);
            }
        }
        $records = $records->paginate($rows);

		//pr(get_class_methods($records));
        $rd['data'] = $records->all();
        $rd['paginator'] = array(
			'sr'      => $records->perPage() * ($records->currentPage()-1),
            'records' => $records
		);
		return $rd;
    }

    public function changeField($data)
    {
        try {
            $this->update($data);
        }
        //catch exception
        catch(Exception $e) {
            //echo 'Message: ' .$e->getMessage();
            return False;
        }
        return true;
    }
}
