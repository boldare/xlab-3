<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\Role;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

class User implements AdvancedUserInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string|null
     */
    private $zipCode;

    /**
     * @var string|null
     */
    private $comment;

    /**
     * @var string
     */
    private $language;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $registrationToken;

    /**
     * @var string|null
     */
    private $resetPasswordToken;

    /**
     * @var bool
     */
    private $active;

    /**
     * @var \DateTimeInterface
     */
    private $created;

    /**
     * @var Collection|UserCompany[]
     */
    private $userCompanies;

    /**
     * @var Collection|Booking[]
     */
    private $bookings;

    /**
     * @var Collection|BookingModel[]
     */
    private $bookingModels;

    /**
     * @var Collection|Subscription[]
     */
    private $subscriptions;

    /**
     * @var array
     */
    private $roles;

    public function __construct()
    {
        $this->userCompanies = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->subscriptions = new ArrayCollection();
        $this->created = new \DateTime();
        $this->active = true;
        $this->roles = [];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $city
     *
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $country
     *
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string|null $zipCode
     *
     * @return User
     */
    public function setZipCode($zipCode = null)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string|null $comment
     *
     * @return User
     */
    public function setComment($comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $language
     *
     * @return User
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string|null $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber = null)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $registrationToken
     *
     * @return User
     */
    public function setRegistrationToken($registrationToken = null)
    {
        $this->registrationToken = $registrationToken;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegistrationToken()
    {
        return $this->registrationToken;
    }

    /**
     * @param string|null $resetPasswordToken
     *
     * @return User
     */
    public function setResetPasswordToken($resetPasswordToken = null)
    {
        $this->resetPasswordToken = $resetPasswordToken;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getResetPasswordToken()
    {
        return $this->resetPasswordToken;
    }

    /**
     * @param bool $active
     *
     * @return Vat
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param \DateTimeInterface $created
     */
    public function setCreated(\DateTimeInterface $created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param UserCompany $userCompanies
     *
     * @return User
     */
    public function addUserCompany(UserCompany $userCompanies)
    {
        $this->userCompanies[] = $userCompanies;

        return $this;
    }

    /**
     * @param UserCompany $userCompanies
     *
     * @return User
     */
    public function removeUserCompany(UserCompany $userCompanies)
    {
        $this->userCompanies->removeElement($userCompanies);

        return $this;
    }

    /**
     * @return Collection|UserCompany[]
     */
    public function getUserCompanies()
    {
        return $this->userCompanies;
    }

    /**
     * @return string|null
     */
    public function getSalt()
    {
        return;
    }

    /**
     * @return array|Role[]
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     *
     * @return User
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        return;
    }

    /**
     * @param Booking $booking
     *
     * @return User
     */
    public function addBooking(Booking $booking)
    {
        $this->bookings[] = $booking;

        return $this;
    }

    /**
     * @param Booking $booking
     *
     * @return User
     */
    public function removeBooking(Booking $booking)
    {
        $this->bookings->removeElement($booking);

        return $this;
    }

    /**
     * @return Collection|Booking[]
     */
    public function getBookings()
    {
        return $this->bookings;
    }

    /**
     * @param BookingModel $booking
     *
     * @return User
     */
    public function addBookingModel(BookingModel $booking)
    {
        $this->bookingModels[] = $booking;

        return $this;
    }

    /**
     * @param BookingModel $booking
     *
     * @return User
     */
    public function removeBookingModel(BookingModel $booking)
    {
        $this->bookingModels->removeElement($booking);

        return $this;
    }

    /**
     * @return Collection|BookingModel[]
     */
    public function getBookingModels()
    {
        return $this->bookingModels;
    }

    /**
     * @param Subscription $subscription
     *
     * @return Company
     */
    public function addSubscription(Subscription $subscription)
    {
        $this->subscriptions[] = $subscription;

        return $this;
    }

    /**
     * @param Subscription $subscription
     */
    public function removeSubscription(Subscription $subscription)
    {
        $this->subscriptions->removeElement($subscription);
    }

    /**
     * @return Collection|Subscription[]
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return sprintf('%s %s', $this->firstName, $this->lastName);
    }

    /**
     * {@inheritdoc}
     */
    public function isAccountNonExpired()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isAccountNonLocked()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isCredentialsNonExpired()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return null === $this->registrationToken;
    }

    /**
     * @param Company $company
     *
     * @return UserCompany|null
     */
    public function findUserCompany(Company $company)
    {
        return $this->userCompanies->filter(
            function (UserCompany $userCompany) use ($company) {
                return $userCompany->getCompany() === $company;
            }
        )->first();
    }

    /**
     * @return bool
     */
    public function isSuperadmin()
    {
        return in_array(UserRole::SUPERADMIN, $this->roles);
    }
}
