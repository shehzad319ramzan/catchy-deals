<?php

namespace App\Dto\Permission;

class RoleDto
{
    public readonly string $name;
    public readonly string $title;
    public readonly string $guard_name;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        $this->name = $request['name'];
        $this->title = $request['title'];
        $this->guard_name = 'web';
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        $return = [
            'name' => $this->name,
            'title' => $this->title,
            'guard_name' => $this->guard_name,
        ];

        return $return;
    }
}
