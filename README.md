# IncompatibleAPIPluginLoader

IncompatibleAPIPluginLoader is, just like the name indicates, a plugin to load plugins that failed loading due to the API version being incompatible. This allows older plugins to be loaded and enabled.<br>

### PLEASE NOTE...
- IncompatibleAPIPluginLoader is NOT responsible for any damage done using loaded plugins with an outdated API version.
- IncompatibleAPIPluginLoader does NOT magically fix outdated plugins. It only **_loads_** plugins of outdated API versions, which means it's very likely that the plugin could be partially, or even entirely broken.

### My server stops when I enable it with this plugin!
- The plugin will give you the possible consequences of using outdated plugins with an incompatible API, and asks you to agree with those, and not to complain about any issues that might occur using an incompatible plugin. The server will then stop.
- If you want the plugin to work, run the server with the option --load-incompatible-api-plugins="true".