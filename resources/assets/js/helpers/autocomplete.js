import autocomplete from 'autocomplete.js';
import algolia from 'algoliasearch'


var index = algolia('T5TO2M6LZZ', 'e1784e3747aad7f8833cd5f485532024')


export const productsautocomplete = (selector, {hitsPerPage, appurl}) => {
	index = index.initIndex('products')

	autocomplete('#products', {}, {
		source: autocomplete.sources.hits(index, {hitsPerPage: hitsPerPage}),
		displayKey: 'name',
		templates: {

			suggestion (suggestion) {
				return `<a class="search__link" href="${appurl}/products/${suggestion.category.slug}/${suggestion.slug}"><span>${suggestion._highlightResult.name.value} </span><small>in category <i>${suggestion.category.name}</i></small></a>`
			},

			empty: '<div class="aa-empty">No Products Found</div>',
		}
	})


}
