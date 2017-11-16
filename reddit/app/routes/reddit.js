import Route from '@ember/routing/route';
import $ from 'jquery';

export default Route.extend({
	model: function() {
		let promise = $.getJSON('https://www.reddit.com/r/cats.json');
		return promise;

		// promise.then(function() {
		// 	console.log('successful');
		// }, function() {
		// 	console.log('error');
		// });

		// return promise;
	}
});
