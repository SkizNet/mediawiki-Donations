<?php

namespace MediaWiki\Extensions\Donations;

use MediaWiki\Skins\Hook\SkinAfterPortletHook;
use OOUI\ButtonWidget;
use Skin;

class Hooks implements SkinAfterPortletHook {
	/**
	 * Displays the HTML donate button in the sidebar when the `sitesupport`
	 * portlet is defined.
	 *
	 * @param Skin $skin
	 * @param string $portletName
	 * @param string &$html
	 * @return void
	 */
	public function onSkinAfterPortlet( $skin, $portletName, &$html ) {
		if ( $portletName === 'sitesupport' || $portletName === 'sitesupport-nav' ) {
			$skin->getOutput()->enableOOUI();
			$skin->getOutput()->addModuleStyles( [ 'ext.donations.icons' ] );
			$html = new ButtonWidget( [
				'label' => wfMessageFallback( 'sitesupport-button', 'sitesupport' )->plain(),
				'href' => wfMessage( 'sitesupport-url' )->plain(),
				'icon' => 'heart',
				'flags' => [ 'primary', 'progressive' ]
			] );
		}
	}
}
