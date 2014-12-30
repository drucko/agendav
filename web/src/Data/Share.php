<?php

namespace AgenDAV\Data;

/*
 * Copyright 2014 Jorge López Pérez <jorge@adobo.org>
 *
 *  This file is part of AgenDAV.
 *
 *  AgenDAV is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  any later version.
 *
 *  AgenDAV is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with AgenDAV.  If not, see <http://www.gnu.org/licenses/>.
 */


/**
 * Holds a shared calendar information
 */

/**
 * @Entity
 * @Table(name="shares")
 */
class Share
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $sid;

    /** @Column(type="string") */
    private $grantor;

    /** @Column(type="string") */
    private $path;

    /** @Column(type="string") */
    private $grantee;

    /** @Column(type="array") */
    private $options = array();

    /** @Column(type="boolean") */
    private $rw;


    /*
     * Setter for sid
     */
    public function setSid($sid)
    {
        $this->sid = $sid;
    }

    /*
     * Getter for sid
     */
    public function getSid()
    {
        return $this->sid;
    }

    /*
     * Getter for grantor
     */
    public function getGrantor()
    {
        return $this->grantor;
    }

    /*
     * Setter for grantor
     */
    public function setGrantor($grantor)
    {
        $this->grantor = $grantor;
        return $this;
    }

    /*
     * Getter for path
     */
    public function getPath()
    {
        return $this->path;
    }

    /*
     * Setter for path
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /*
     * Getter for grantee
     */
    public function getGrantee()
    {
        return $this->grantee;
    }

    /*
     * Setter for grantee
     */
    public function setGrantee($grantee)
    {
        $this->grantee = $grantee;
        return $this;
    }

    /*
     * Returns true if a share allows modifications
     */
    public function isWritable()
    {
        return $this->rw === true;
    }

    /*
     * Setter for rw
     *
     * @param bool $rw  Whether this share allows modifications or not
     */
    public function setWritePermission($rw)
    {
        $this->rw = $rw;
        return $this;
    }

    /**
     * Returns all properties/options set on the shared resource
     *
     * @return Array
     */
    public function getProperties()
    {
        return $this->options;
    }

    /**
     * Returns a property/option set on this resource, or null if it
     * is not set
     */
    public function getProperty($name)
    {
        return array_key_exists($name, $this->options) ?  $this->options[$name] : null;
    }

    /**
     * Sets a property/option on this resource
     */
    public function setProperty($name, $value)
    {
        $this->options[$name] = $value;
        return $this;
    }

    public function to_json() {
        return json_encode($this->options);
    }
}
