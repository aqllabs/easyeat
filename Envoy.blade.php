@servers(['web' => ['user@your-ip-address']])

{{--Set up the branch and project folder--}}
@setup
    $branch = 'master';
    $folder = '/home/user/project_folder';
@endsetup

@story('deploy')
    git
    composer
    artisan
    npm
@endstory

{{--Update the project from the repository--}}
@task('git', ['on' => 'web'])
    cd {{ $folder }}

    git fetch --all
    git reset --hard origin/{{ $branch }}
@endtask

{{--Install the composer dependencies--}}
@task('composer', ['on' => 'web'])
    cd {{ $folder }}

    composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
@endtask

{{--Run the migrations and clear the cache--}}
@task('artisan', ['on' => 'web'])
    cd {{ $folder }}

    php artisan migrate --force
    php artisan cache:clear
    php artisan generate:sitemap
@endtask

{{--Install the npm dependencies and build the assets--}}
@task('npm', ['on' => 'web'])
    cd {{ $folder }}

    npm install
    npm run build
@endtask

{{--Notify the team on Slack for successful deployment--}}
@success
    @slack('webhook-url', '#bots')
@endsuccess

{{--Notify the team on Slack for failed deployment--}}
@error
    @slack('webhook-url', '#bots')
@enderror
