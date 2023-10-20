<?php

require('vendor/autoload.php');

use Ibrahimalanshor\Spl\AccessInfo;

$accessInfo = new AccessInfo();

$accessInfo->set(json_decode('{
    "iss": "xsvmxG9xEjbZ389jDXs1jPlwjzUEri0E",
    "user": {
      "id": 2,
      "email": "admin@dinsos.com",
      "name": "Admin Dinas Sosial"
    },
    "services": [
      "dinas-sosial"
    ],
    "roles": [
      "dinas-sosial.Admin"
    ],
    "roleNames": [
      "Admin"
    ],
    "permissions": [
      "PATCH data-pemeringkatan.*",
      "GET data-pemeringkatan",
      "GET data-pemeringkatan.*",
      "GET data-pemeringkatan.nik",
      "GET data-pemeringkatan.nama",
      "PATCH data-pemeringkatan",
      "PATCH data-pemeringkatan.nama"
    ],
    "permissionNames": [
      "dinas-sosial.PATCH data-pemeringkatan.*",
      "dinas-sosial.GET data-pemeringkatan",
      "dinas-sosial.GET data-pemeringkatan.*",
      "dinas-sosial.GET data-pemeringkatan.nik",
      "dinas-sosial.GET data-pemeringkatan.nama",
      "dinas-sosial.PATCH data-pemeringkatan",
      "dinas-sosial.PATCH data-pemeringkatan.nama"
    ]
  }'));

// var_dump($accessInfo->hasPermission(['GET data-pemeringkatan', 'PATCH.data-pemeringkatan']));
var_dump(new Ibrahimalanshor\Spl\Http\Middleware\HasAccessInfo);