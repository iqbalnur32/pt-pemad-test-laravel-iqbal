<?php

namespace App\Interfaces;

use App\Http\Requests\ProyekRequest;

interface ProyekInterface
{
    /**
     * Get all users
     * 
     * @method  GET pekerjaan
     * @access  public
     */
    public function getAll();
    public function getAllKlien();

    /**
     * Get User By ID
     * 
     * @param   integer     $id
     * 
     * @method  GET pekerjaan/{id}
     * @access  public
     */
    public function getById($id);

    /**
     * Create | Update user
     * 
     * @param   \App\Http\Requests\ProyekRequest    $request
     * @param   integer                           $id
     * 
     * @method  POST    pekerjaan       For Create
     * @method  PUT     pekerjaan/{id}  For Update     
     * @access  public
     */
    public function requestUser(ProyekRequest $request, $id = null);

    /**
     * Delete user
     * 
     * @param   integer     $id
     * 
     * @method  DELETE  pekerjaan/{id}
     * @access  public
     */
    public function delete($id);
}