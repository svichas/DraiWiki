/**
 * DRAIWIKI
 * Open source wiki software
 *
 * @version     1.0 Alpha 1
 * @author      Robert Monden
 * @copyright   DraiWiki, 2017
 * @license     Apache 2.0
 */

function loadEditor(editor) {
	var simplemde = new SimpleMDE({
		element: document.getElementById(editor)
	});
}