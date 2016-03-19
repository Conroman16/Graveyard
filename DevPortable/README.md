# DevPortable
A fully portable NoodeJS development environment complete with npm.

### Usage
Open the `Node.js Command Prompt` file.  To execute js files, just type `nodep yourFileName` or `np yourFileName`.

-

##### Note
The shortcuts are reliant on the `%DEVPORTABLE%` envirionment variable being available on your system.  To configure this variable, run `SetEnvironmentVariable.ps1` located in the `Setup` folder.  This will prompt you for the path to the root folder.  If you get an error when you run `SetEnvironmentVariable.ps1`, go into the `Setup/ExecutionPolicySetters` folder and double-click the appropriate `.reg` file.  You'll probably want to go with `Unrestricted` or `RemoteSigned`.  You can set it back to `Restricted` after setting the environment variable if you want.