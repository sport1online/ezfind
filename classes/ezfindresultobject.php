<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */

class eZFindResultObject extends eZContentObject
{
    /*!
     \reimp
    */
    public function __construct($rows = array() )
    {
        $this->LocalAttributeValueList = array();
        $this->LocalAttributeNameList = array( 'published' );

        foreach ( $rows as $name => $value )
        {
            $this->setAttribute( $name, $value );
        }
    }

    /*!
     \reimp
    */
    public function attribute($attr, $noFunction = false )
    {
        return isset( $this->LocalAttributeValueList[$attr] ) ?
                $this->LocalAttributeValueList[$attr] : null;
    }

    /*!
     \reimp
    */
    public function setAttribute($attr, $value )
    {
        if ( in_array( $attr, $this->LocalAttributeNameList ) )
        {
            $this->LocalAttributeValueList[$attr] = $value;
        }
    }

    /*!
     \reimp
    */
    public function attributes()
    {
        return array_merge( $this->LocalAttributeNameList,
                            eZContentObject::attributes() );
    }

    /*!
     \reimp
    */
    public function hasAttribute($attr )
    {
        return ( in_array( $attr, $this->LocalAttributeNameList ) ||
                 eZContentObject::hasAttribute( $attr ) );
    }


    /// Object variables
    public $LocalAttributeValueList;
    public $LocalAttributeNameList;
}

?>
