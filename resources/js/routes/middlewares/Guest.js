export default function guest({next, router}) {
	if (!window.localStorage.getItem('token')) {
		return next();
	}

	return router.push({name: 'Home'});
}