<?php
namespace notas\src\core;

abstract class UserModel extends DbModel {
    abstract public function getDisplayName(): string;
}
