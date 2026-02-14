import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
import metadata from './block.json';

export default function Edit( { attributes } ) {
	return (
		<>
			<div { ...useBlockProps() }>
				<ServerSideRender
					block={ metadata.name }
					attributes={ attributes }
					EmptyResponsePlaceholder={ () => (
						<p>{ __( 'Loading latest projects…', 'latest-project' ) }</p>
					) }
				/>
			</div>
		</>
	);
}
