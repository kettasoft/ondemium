export default function auth({next, router}) {
	if (window.localStorage.getItem('token')) {
		return next();
	}

	return router.push({name: 'Home'});
}