<?php

namespace Database\Seeders;

use App\Domains\User\Enums\MemberRole;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\Laravel\Facades\Image;

class UserSeeder extends Seeder
{
    public static array $users = [
        [
            'name' => 'Jason Walker',
            'info' => 'Aggressive and unpredictable, Jason has the skills to be a serious threat in any race.',
        ],
        [
            'name' => 'Sofia Martinez',
            'info' => 'An ice cold professional racer, Sofia isn\'t easily lured into crashes and prides herself on racing clean.',
        ],
        [
            'name' => 'Sally Taylor',
            'info' => 'Cheerful and not too worried about results, Sally is usually happy go lucky, but she can turn mean if her car is hit too often.',
        ],
        [
            'name' => 'Frank Malcov',
            'info' => 'A once great driver from a previous era with too many crashes and collisions behind him. His behavior is erratic and age has dulled his skills.',
        ],
        [
            'name' => 'Katie Jackson',
            'info' => 'The former casual-drivers club president is now on the verge of a nervous breakdown after too many rush-hour traffic jams. You should give her plenty of track space!',
        ],
        [
            'name' => 'Ray Carter',
            'info' => 'Laid back driver with genuine racing talent, but sometimes seems indifferent about winning or losing. Skillful enough to win.. if he feels like it.',
        ],
    ];

    private string $domain = 'nanodepo.net';
    private string $password = '1q2w3e4r';

    public function run(): void
    {
        foreach (self::$users as $user) {
            UserFactory::new()->extra([
                'name' => $user['name'],
                'email' => str($user['name'])->slug('.')->append('@')->append($this->domain)->value(),
                'password' => bcrypt($this->password),
                'avatar' => $this->writeImage(
                    image: new UploadedFile(
                        path: base_path(str($user['name'])->slug('.')->prepend('/resources/images/')->append('.webp')->value()),
                        originalName: str($user['name'])->slug('.')->append('.webp')->value()
                    ),
                    dir: 'profile',
                    width: 360,
                    height: 360,
                    name: str($user['name'])->slug()->value(),
                ),
                'role' =>  match($user['name']) {
                    'Jason Walker' => MemberRole::Root,
                    'Sofia Martinez' => MemberRole::Admin,
                    'Frank Malcov' => MemberRole::Manager,
                    default => MemberRole::User,
                },
            ])->create();
        }
    }

    /**
     * A function that displays a notification in the lower right corner of the screen.
     * @param UploadedFile $image uploaded image
     * @param string $dir uploaded file dir, default "other"
     * @param int $width width scale
     * @param int $height height scale
     * @param string|null $name file name
     * @return string
     */
    private function writeImage(
        UploadedFile $image,
        string $dir = 'other',
        int $width = 1000,
        int $height = 1000,
        ?string $name = null,
    ): string
    {
        $storage = Storage::disk('images');

        if (!$storage->exists($dir)) {
            $storage->makeDirectory($dir);
        }

        $filename = is_null($name)
            ? str(str()->uuid())->append('.webp')
            : str($name)->slug()->append('.webp');

        Image::read($image)
            ->scale($width, $height)
            ->encode(new WebpEncoder(quality: 75))
            ->save($storage->path("$dir/$filename"));

        return $filename;
    }
}
