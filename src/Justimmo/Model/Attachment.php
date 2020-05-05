<?php

namespace Justimmo\Model;

use Justimmo\Exception\AttachmentSizeNotFoundException;

class Attachment
{
    protected $type;

    protected $extension;

    protected $title = null;

    protected $originalFilename = null;

    protected $data = array();

    protected $group = null;

    protected static $pictureExtensions = array('jpg', 'gif', 'png', 'jpeg');

    protected static $videoExtensions = array('avi', 'mp4', 'mpg', 'wmv');

    protected static $linkGroups = array('LINKS', 'FILMLINK', 'RUNDGANG', 'PROJEKTURL');

    public function __construct($path, $type = null, $group = null)
    {
        $this->extension = pathinfo($path, PATHINFO_EXTENSION);
        $this->data['orig'] = $path;
        $this->group = $group;
        $this->type = $type;

        if ($type === null) {
            $this->type = $this->determineType();
        }
    }

    public function getUrl($size = 'orig')
    {
        if (!array_key_exists($size, $this->data)) {
            throw new AttachmentSizeNotFoundException('The size "' . $size . '" was not found');
        }

        return $this->data[$size];
    }

    /**
     * gets a url to an attachment size, even if the api does not return that size.
     * BEWARE: this method cannot ensure that the url is a valid ressource
     *
     * @param string $size
     *
     * @return string
     */
    public function calculateUrl($size = 'orig')
    {
        return preg_replace("!\/(pic|video)\/(\w+)\/!", "/$1/".$size."/", $this->getUrl());
    }

    /**
     * Tries to determine type by extention or group
     *
     * @return string
     */
    protected function determineType()
    {
        if (in_array($this->group, static::$linkGroups)) {
            return 'link';
        }

        if (in_array($this->extension, static::$pictureExtensions)) {
            return 'picture';
        }

        if (in_array($this->extension, static::$videoExtensions)) {
            return 'video';
        }

        return 'document';
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function addData($key, $value)
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function mergeData(array $data)
    {
        $this->data += $data;

        return $this;
    }

    /**
     * @param mixed $extension
     *
     * @return $this
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param mixed $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param null $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null $originalFilename
     *
     * @return $this
     */
    public function setOriginalFilename($originalFilename)
    {
        $this->originalFilename = $originalFilename;

        return $this;
    }

    /**
     * @return null
     */
    public function getOriginalFilename()
    {
        return $this->originalFilename;
    }

    /**
     * @param null|string $value
     *
     * @return $this
     */
    public function setGroup($value)
    {
        $this->group = $value;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param string $size
     *
     * @return string|null
     * @throws AttachmentSizeNotFoundException
     */
    public function getVideoPosterUrl($size = 'orig')
    {
        if ($this->getType() !== 'video') {
            return null;
        }

        $videoUrl = $this->getUrl($size);
        $posterUrlParts = explode('.', str_replace('/video/', '/pic/', $videoUrl));
        $posterUrlParts[count($posterUrlParts)-1] = 'jpg';
        return implode('.', $posterUrlParts);
    }

}
