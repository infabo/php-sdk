<?php

namespace Justimmo\Model\Wrapper\V1;

use Justimmo\Model\Objekt;
use Justimmo\Model\Wrapper\WrapperInterface;

class ObjektWrapper implements WrapperInterface
{
    /**
     * simple attributes mostly used in list call
     *
     * @var array
     */
    protected $simpleMapping = array(
        'id'                 => 'int',
        'objektnummer'       => 'string',
        'titel'              => 'string',
        'dreizeiler'         => 'string',
        'naehe'              => 'string',
        'objektbeschreibung' => 'string',
        'etage'              => 'string',
        'tuernummer'         => 'string',
        'plz'                => 'string',
        'ort'                => 'string',
        'kaufpreis'          => 'string',
        'gesamtmiete'        => 'string',
        'nutzflaeche'        => 'string',
        'grundflaeche'       => 'string',
        'projekt_id'         => 'int',
        'status'             => 'string',
    );

    /**
     * @param $data
     *
     * @return Objekt
     */
    public function transform($data)
    {
        $xml = new \SimpleXMLElement($data);

        if (isset($xml->immobilie)) {
            $xml = $xml->immobilie;
        }

        $objekt = new Objekt();

        //basic attributes from list view
        foreach ($this->simpleMapping as $key => $cast) {
            if (isset($xml->$key)) {
                $setter = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));

                if ($cast == 'string') {
                    $objekt->$setter((string)$xml->$key);
                } elseif ($cast == 'int') {
                    $objekt->$setter((int)$xml->$key);
                }
            }
        }

        //detailed attributes from detail view, OpenImmo
        if (isset($xml->verwaltung_techn)) {
            $objekt->setId((int) $xml->verwaltung_techn->objektnr_intern);
            $objekt->setObjektnummer((string) $xml->verwaltung_techn->objektnr_extern);
            $objekt->setProjektId((int) $xml->verwaltung_techn->projekt_id);
        }

        if (isset($xml->objektkategorie)) {
            if (isset($xml->objektkategorie->objektart)) {
                $objekt->setObjektart((string) $xml->objektkategorie->objektart->children()->getName());
            }
            if (isset($xml->objektkategorie->nutzungsart)) {
                $objekt->setNutzungsart($this->attributesToArray($xml->objektkategorie->nutzungsart->attributes()));
            }
            if (isset($xml->objektkategorie->vermarktungsart)) {
                $objekt->setVermarktungsart($this->attributesToArray($xml->objektkategorie->vermarktungsart->attributes()));
            }
        }

        if (isset($xml->freitexte)) {
            $objekt->setTitel((int) $xml->freitexte->objekttitel);
            $objekt->setAusstattBeschr((string) $xml->freitexte->ausstatt_beschr);
            $objekt->setObjektbeschreibung((string) $xml->freitexte->objektbeschreibung);
        }

        return $objekt;
    }

    /**
     * converts the attributes of a SimpleXmlElement to an array
     *
     * @param \SimpleXMLElement $xml
     *
     * @return array
     */
    protected function attributesToArray(\SimpleXMLElement $xml)
    {
        $array = (array) $xml;

        return array_key_exists('@attributes', $array) ? $array['@attributes'] : array();
    }
}
