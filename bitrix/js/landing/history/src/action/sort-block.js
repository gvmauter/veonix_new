const {scrollTo, highlight} = BX.Landing.Utils;

/**
 * @param {object} entry
 * @return {Promise}
 */
export default function sortBlock(entry)
{
	return BX.Landing.PageObject.getInstance().blocks()
		.then((blocks) => {
			const block = blocks.get(entry.block);
			block.forceInit();

			return scrollTo(block.node)
				.then(highlight.bind(null, block.node))
				.then(() => {
					return block[entry.params.direction](true);
				});
		});
}