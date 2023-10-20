<?php

namespace Ibrahimalanshor\Spl;

/**
 * AccessInfo
 */
class AccessInfo {
    private $auth;
    
    /**
     * set auth property
     *
     * @param  mixed $auth
     * @return void
     */
    public function set($auth) {
        $this->auth = $auth;

        return $this;
    }
    
    /**
     * get auth property
     *
     * @return void
     */
    public function get() {
        return $this->auth;
    }
    
    /**
     * semua permissions
     *
     * @return void
     */
    public function permissions() {
        return collect($this->auth->permissions);
    }
    
    /**
     * semua services
     *
     * @return void
     */
    public function services() {
        return collect($this->auth->services);
    }
    
    /**
     * semua roles
     *
     * @return void
     */
    public function roles() {
        return collect($this->auth->roles);
    }
    
    /**
     * apakah punya permissions
     *
     * @param  mixed $permissionName
     * @return void
     */
    public function hasPermission($permissionName) {
        if (is_array($permissionName)) {
            return $this->permissions()->intersect($permissionName)->isNotEmpty();
        }

        return $this->permissions()->contains($permissionName);
    }
    
    /**
     * apakah punya kolom permissions
     *
     * @param  mixed $method
     * @param  mixed $resource
     * @param  mixed $columnName
     * @return void
     */
    public function hasColumnPermission(string $method, string $resource, $columnName) {
        if ($this->permissions()->contains("$method $resource.*")) {
            return true;
        }

        if (is_array($columnName)) {
            $columnNameParsed = collect($columnName)->map(function ($name) use ($method, $resource) {
                return "$method $resource.$name";
            });

            return $this->permissions()->intersect($columnNameParsed)->isNotEmpty();
        }

        return $this->permissions()->contains(function ($value) use ($method, $resource, $columnName) {
            return $value === "$method $resource.$columnName";
        });
    }
    
    /**
     * apakah punya service
     *
     * @param  mixed $serviceName
     * @return void
     */
    public function hasService($serviceName) {
        if (is_array($serviceName)) {
            return $this->services()->intersect($serviceName)->isNotEmpty();
        }

        return $this->services()->contains($serviceName);
    }
    
    /**
     * apakah punya role
     *
     * @param  mixed $roleName
     * @return void
     */
    public function hasRole($roleName) {
        if (is_array($roleName)) {
            return $this->roles()->intersect($roleName)->isNotEmpty();
        }

        return $this->roles()->contains($roleName);
    }

}