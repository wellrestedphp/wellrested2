<?php

/**
 * pjdietz\WellRESTed\Interfaces\RequestInterface
 *
 * @author PJ Dietz <pj@pjdietz.com>
 * @copyright Copyright 2015 by PJ Dietz
 * @license MIT
 */

namespace pjdietz\WellRESTed\Interfaces;

/**
 * Interface for representing an HTTP request.
 */
interface RequestInterface
{
    /**
     * Return the HTTP verb (e.g., GET, POST, PUT).
     *
     * @return string Request verb
     */
    public function getMethod();

    /**
     * Return the full URI for the request.
     *
     * @return string
     */
    public function getUri();

    /**
     * Return the hostname portion of the URI
     *
     * @return string
     */
    public function getHostname();

    /**
     * Return path component of the request URI.
     *
     * @return string Path component
     */
    public function getPath();

    /**
     * Return the HTTP port
     *
     * @return int
     */
    public function getPort();

    /**
     * Return an associative array of query paramters.
     *
     * @return array Query paramters
     */
    public function getQuery();

    /**
     * Return the value for a given header.
     *
     * Per RFC 2616, HTTP headers are case-insensitive. Take care to conform to
     * this when implementing.
     *
     * @param string $headerName Field name of the header
     * @return string Header field value
     */
    public function getHeader($headerName);

    /**
     * Return an associative array of headers.
     *
     * @return array
     */
    public function getHeaders();

    /**
     * Return the body of the request.
     *
     * @return string Request body
     */
    public function getBody();
}
