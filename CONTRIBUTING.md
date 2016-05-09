# Contributing

We are currently trying to get this SDK to a full version 1 release. Most API calls are working properly, save for the few mentioned in the changelog.

## Getting Started

* Create a Shopify Partners account, and create a new Application.
* Make sure you have a dev-store ot test on
* Follow the installation instructions in the README to get your environment set up

## Making Changes

* Make sure an issue ticket exists, if working on a bugfix
* Create a new branch with a descriptive name
* Complete your local work
* Add required tests for any functionality you are creating / modifying.
* Ensure all tests pass before submitting a pull request
* If test fail, pull requests will be automatically rejected

## Testing

    When tests are run, we initialiez the '\Shopfiy\Shopify' global with 'test = true'. Now
    when it instantiates the Client, it instead opts for TestClient. The TestClient parses
    request URLs and methods, and returns the necessary mock response from ./data

    You can also use this functionality for testing, so as not to hit a rate limit. Be aware though,
    that there is no linear relation between IDs. If you call products/1 or products/2, you will
    get the same response.
