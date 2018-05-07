const apiDomain = Laravel.apiDomain;
export const siteName = Laravel.siteName;

export const api = {
	login: apiDomain + '/authenticate',
	currentUser: apiDomain + '/user',
	updateUserProfile: apiDomain + '/user/profile/update',
	updateUserPassword: apiDomain + '/user/password/update',
	getProjects: apiDomain + '/project',
	getProject: apiDomain + '/project',
	getTimeLog: apiDomain + '/time-log',
    updateTimeLog: apiDomain + '/time-log',
    updateProjectCap: apiDomain + '/project',
};