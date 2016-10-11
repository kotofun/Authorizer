<?php

namespace App\Services;

use Illuminate\Support\Facades\Request;

/**
 * Class RedirectMapper.
 *
 * It's a tiny helper class for maintaining redirects map.
 *
 * @author Dmitry Basavin <basavind@gmail.com>
 */
class RedirectMapper
{
    /**
     * The GET key, that responsible for redirects.
     *
     * @var string
     */
    protected $redirectKey = 'r';

    /**
     * Allowed list of route aliases.
     *
     * @var array
     */
    protected $aliases = [];

    /**
     * Alias for current URI.
     *
     * @var string|null
     */
    private $redirectHere = null;

    /**
     * URI for redirect from current alias.
     *
     * @var string|null
     */
    private $redirectTo = null;

    /**
     * RedirectMapper constructor.
     */
    public function __construct()
    {
        $this->loadAliases();
        $this->buildAliasForHere();
        $this->buildURIForRedirectTo();
    }

    private function loadAliases()
    {
        $config = config('redirects');
        if ( ! is_null($config)) {
            $this->aliases = array_merge($this->aliases, $config);
        }
    }

    private function buildAliasForHere()
    {
        $this->redirectHere = $this->alias(Request::path());
    }

    /**
     * Return alias for given uri if it exists.
     *
     * @param $uri
     *
     * @return string|null
     */
    public function alias($uri)
    {
        if (is_null($uri)) {
            return;
        }

        $straight = $this->aliases;
        if (array_key_exists($uri, $straight)) {
            return $straight[$uri];
        }

        return;
    }

    private function buildURIForRedirectTo()
    {
        if ($redirect = Request::get('r')) {
            $this->redirectTo = $this->uri($redirect);
        }
    }

    /**
     * Returns uri for given alias if it exists.
     *
     * @param $alias
     *
     * @return string | null
     */
    public function uri($alias)
    {
        if (is_null($alias)) {
            return;
        }

        $flipped = array_flip($this->aliases);
        if (array_key_exists($alias, $flipped)) {
            return $flipped[$alias];
        }

        return;
    }

    /**
     * @return string|null
     */
    public function getRedirectHere()
    {
        return $this->redirectHere;
    }

    /**
     * @return string|null
     */
    public function getRedirectTo()
    {
        return $this->redirectTo;
    }
}
