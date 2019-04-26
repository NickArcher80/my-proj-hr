<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="orders_partner_id_foreign", columns={"partner_id"})})
 * @ORM\Entity
 */
class Orders
{
/**
 * @var integer
 *
 * @ORM\Column(name="id", type="integer", nullable=false)
 * @ORM\Id
 * @ORM\GeneratedValue(strategy="IDENTITY")
 */
private $id;

/**
 * @var integer
 *
 * @ORM\Column(name="status", type="integer", nullable=false)
 */
private $status;
/**
 * @var integer
 */
private $sum;

/**
 * @var string
 *
 * @ORM\Column(name="client_email", type="string", length=255, nullable=false)
 */
private $clientEmail;

/**
 * @var \DateTime
 *
 * @ORM\Column(name="delivery_dt", type="datetime", nullable=false)
 */
private $deliveryDt = 'CURRENT_TIMESTAMP';

/**
 * @var \DateTime
 *
 * @ORM\Column(name="created_at", type="datetime", nullable=true)
 */
private $createdAt;

/**
 * @var \DateTime
 *
 * @ORM\Column(name="updated_at", type="datetime", nullable=true)
 */
private $updatedAt;

/**
 * @var \Partners
 *
 * @ORM\ManyToOne(targetEntity="Partners")
 * @ORM\JoinColumns({
 *   @ORM\JoinColumn(name="partner_id", referencedColumnName="id")
 * })
 */
private $partner;

/**
 * One Order has Many Products.
 * @ORM\OneToMany(targetEntity="OrderProducts", mappedBy="order")
 */
private $products;

public function __construct() {
$this->products = new \Doctrine\Common\Collections\ArrayCollection();
}

public function getId(): ?int
{
return $this->id;
}

public function getStatus(): ?int
{
return $this->status;
}

public function setStatus(int $status): self
{
$this->status = $status;

return $this;
}
public function getSum(): ?int
{
return $this->sum;
}

public function setSum(int $sum): self
{
$this->sum = $sum;

return $this;
}

public function getClientEmail(): ?string
{
return $this->clientEmail;
}

public function setClientEmail(string $clientEmail): self
{
$this->clientEmail = $clientEmail;

return $this;
}

public function getDeliveryDt(): ?\DateTimeInterface
{
return $this->deliveryDt;
}

public function setDeliveryDt(\DateTimeInterface $deliveryDt): self
{
$this->deliveryDt = $deliveryDt;

return $this;
}

public function getCreatedAt(): ?\DateTimeInterface
{
return $this->createdAt;
}

public function setCreatedAt(?\DateTimeInterface $createdAt): self
{
$this->createdAt = $createdAt;

return $this;
}

public function getUpdatedAt(): ?\DateTimeInterface
{
return $this->updatedAt;
}

public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
{
$this->updatedAt = $updatedAt;

return $this;
}

public function getPartner(): ?Partners
{
return $this->partner;
}

public function setPartner(?Partners $partner): self
{
$this->partner = $partner;

return $this;
}
/**
 * @return Collection|Products[]
 */
public function getProducts()
{
return $this->products;
}

public function setProducts(?OrderProducts $products): self
{
$this->products = products;

return $this;
}

}

