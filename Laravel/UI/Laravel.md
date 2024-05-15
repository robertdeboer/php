# Laravel UI
Laravel is technically a PHP based framework and so it's expressed purpose does not include the
UI of web applications. Therefore, it lacks JS/CSS presets and HTML boilerplate beyond a single welcome page. 
Laravel does have UI "Kits" that can be installed, from very simple to more complete with ready to go layouts,
authentication forms, etc. Some of these even allow the developer to choose different libraries for
the different parts of the UI scaffolding.

## The Problem
The main problem with these UI kits is that they do not seam to play nice
with other UI libraries, especially component libraries. This is due to the decision
by Laravel to only use Tailwind CSS for the CSS side of their kits (they give options for other parts of
the UI, just not for the CSS). While this may not seam bad on the surface, it doesn't allow the drop in
usage of component libraries as the CSS often conflicts between the UI kit and the library. In addition,
the UI libraries may use more up-to-date versions of TailwindCSS than the UI kit does but upgrading 
Tailwind might break the UI kit or cause other side effects.

## A solution
One solution would be to make the application headless and host the UI of it somewhere else,
somewhere that is expressive built for it and the setup can be used exactly as needed.

However, in the event that the UI needs to be created on the same server as the application, the
following solutions represent ways to replicate the benefits of the UI kit while also giving the
developer the ability to use whatever component they want for whatever area - JS/CSS/etc - and so avoid
the conflicts that arise when trying to use a Laravel UI kit with other UI libraries.

All solutions use the common items:
- Vite. All front end integration, configuration, and building is done through vite

All other components can be changed as needed: React vs Vue, Bootstrap vs TailWind, etc, etc.

All the current implementations are Single Page Applications (SPA) as they represent the best
integration method with Laravel.

To do's:
- [ ] Investigate the use of the Vue CLI
- [ ] Investigate the use of different rendering methods: SSR,etc

### Vue SPA
This solution utilizes Vite for the configuration and build step of the UI with a single view
serving as the root component. The rest of the setup is that of a typical Vue SPA: 
Vue, Vue Router, Pinia (formally Vue Store), etc. This setup is more suited to a public
facing UI where speed and optimized user experience is paramount.

### Vue Inertia
This setup is similar to the Vue SPA but swaps out the Vue Router for [Inertia JS](https://inertiajs.com/). 
This allows tighter integration with Laravel routes and authentication and can utilize a few JS helper classes
to pull information from Laravel. This setup is more suited to UI's where security and control are more or just 
as important site speed. A good example is admin interfaces where security and control of all the views, calls, 
etc as just as important as the speed of the admin interface. 