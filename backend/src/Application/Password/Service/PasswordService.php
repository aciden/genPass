<?php

namespace Generator\Application\Password\Service;

use Doctrine\Common\Collections\Collection;
use Generator\Application\Password\Dto\PasswordDto;
use Generator\Entity\Application\Application;
use Generator\Entity\Password\Password;
use Generator\Entity\Password\PasswordRepositoryInterface;
use Generator\Entity\Password\PasswordServiceInterface;

/**
 * Class PasswordService
 * @package Generator\Password\Service
 */
class PasswordService implements PasswordServiceInterface
{
    /**
     * @var PasswordRepositoryInterface
     */
    private $passwordRepository;

    /**
     * PasswordService constructor.
     * @param PasswordRepositoryInterface $passwordRepository
     */
    public function __construct(PasswordRepositoryInterface $passwordRepository)
    {
        $this->passwordRepository = $passwordRepository;
    }

    public function getById(int $id): Password
    {
        return $this->passwordRepository->getPassword($id);
    }

    /**
     * @param Application $application
     * @return array
     */
    public function getActivePasswords(Application $application): array
    {
        return $this->passwordRepository->findActivePasswords($application);
    }

    /**
     * @param Application $application
     * @return array
     */
    public function getInactivePasswords(Application $application): array
    {
        return $this->passwordRepository->findInactivePasswords($application);
    }

    /**
     * @param int $passwordID
     * @return Password
     * @throws \Exception
     */
    public function deletePassword(Password $password): Password
    {
        $password->setActive(false);
        $password->setDateDelete(new \DateTimeImmutable());

        $this->passwordRepository->save($password);

        return $password;
    }

    /**
     * @param Password $password
     * @param PasswordDto $passwordDto
     * @return Password
     * @throws \Exception
     */
    public function update(Password $password, PasswordDto $passwordDto): Password
    {
        $newPassword = new Password(
            $passwordDto->login,
            $passwordDto->password,
            $password->getApplication(),
            $password->getUser()
        );
        $newPassword->setDate(new \DateTimeImmutable());
        $this->passwordRepository->save($newPassword);

        $this->deletePassword($password);

        return $newPassword;
    }

    /**
     * @param Application $application
     * @param PasswordDto $passwordDto
     * @return Password
     * @throws \Exception
     */
    public function create(Application $application, PasswordDto $passwordDto): Password
    {
        $newPassword = new Password(
            $passwordDto->login,
            $passwordDto->password,
            $application,
            $application->getUser()
        );
        $newPassword->setDate(new \DateTimeImmutable());
        $this->passwordRepository->save($newPassword);

        return $newPassword;
    }

    /**
     * @param int $length
     * @param array $options
     * @return string
     */
    public function generatePassword(int $length, array $options): string
    {
        $pas = '';
        $withoutSymbols = [];
        if (! in_array('letters', $options) && ! in_array('symbol', $options)) {
            $startSymbol = 48;
            $endSymbol = 57;
        } elseif (! in_array('symbol', $options)) {
            $startSymbol = 48;
            $endSymbol = 122;
            $withoutSymbols = [58, 59, 60, 61, 62, 91, 92, 93, 96];
        } else {
            $startSymbol = 33;
            $endSymbol = 122;
            $withoutSymbols = [34, 39, 44, 45, 47, 58, 59, 60, 61, 62, 91, 92, 93, 96];
        }

        for ($i = 1; $i <= $length;){
            $generator = rand($startSymbol, $endSymbol);
            if (! in_array($generator, $withoutSymbols)){
                $pas .= chr($generator);
                $i++;
            }
        }

        return $pas;
    }
}
